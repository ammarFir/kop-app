<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    // Tampilkan daftar anggota (khusus FO & Super Admin)
    public function index(Request $request)
    {
        $search = $request->input('search');

        $anggotaList = User::where('role', 'anggota')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('no_anggota', 'like', '%' . $search . '%')
                    ->orWhere('nik', 'like', '%' . $search . '%');
            })
            ->paginate(2);

        return view('anggota.index', compact('anggotaList', 'search'));
    }

    // Tampilkan form tambah anggota (khusus FO)
    public function create()
    {
        return view('anggota.create');
    }

    // Simpan anggota baru (khusus FO)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'nik' => 'required|digits:16|unique:users,nik',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        // Generate nomor anggota otomatis
        $lastAnggota = User::where('role', 'anggota')
            ->whereNotNull('no_anggota')
            ->orderBy('no_anggota', 'desc')
            ->first();

        if ($lastAnggota) {
            $lastNumber = (int) substr($lastAnggota->no_anggota, 4);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }
        $noAnggota = 'KOP-' . $newNumber;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password123'), // default password
            'role' => 'anggota',
            'no_anggota' => $noAnggota,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'is_active' => true,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan! Nomor Anggota: ' . $noAnggota);
    }

    // Tampilkan form edit anggota (khusus FO)
    public function edit($id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    // Update data anggota (khusus FO)
    public function update(Request $request, $id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $anggota->id,
            'nik' => 'required|digits:16|unique:users,nik,' . $anggota->id,
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $anggota->update([
            'name' => $request->name,
            'email' => $request->email,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diupdate!');
    }

    // Hapus anggota (khusus FO)
    public function destroy($id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }

    // Export data anggota ke Excel
    public function export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\AnggotaExport, 'data-anggota.xlsx');
    }
}
