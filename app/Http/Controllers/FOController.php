<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FOController extends Controller
{
    // Tampilkan daftar FO
    public function index()
    {
        $foList = User::where('role', 'fo')->get();
        return view('fo.index', compact('foList'));
    }

    // Tampilkan form tambah FO
    public function create()
    {
        return view('fo.create');
    }

    // Simpan FO baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'fo',
            'is_active' => true,
        ]);



        return redirect()->route('fo.index')->with('success', 'FO berhasil ditambahkan!');
    }

    // Tampilkan form edit FO
    public function edit($id)
    {
        $fo = User::where('role', 'fo')->findOrFail($id);
        return view('fo.edit', compact('fo'));
    }

    // Update data FO
    public function update(Request $request, $id)
    {
        $fo = User::where('role', 'fo')->findOrFail($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $fo->id,
            'is_active' => 'required|boolean',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'is_active' => $request->is_active,
        ];

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:8']);
            $data['password'] = Hash::make($request->password);
        }

        $fo->update($data);

        return redirect()->route('fo.index')->with('success', 'FO berhasil diupdate!');
    }

    // Hapus FO
    public function destroy($id)
    {
        $fo = User::where('role', 'fo')->findOrFail($id);
        $fo->delete();

        return redirect()->route('fo.index')->with('success', 'FO berhasil dihapus!');
    }
}
