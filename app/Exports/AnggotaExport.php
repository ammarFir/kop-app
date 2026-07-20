<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AnggotaExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::where('role', 'anggota')->get();
    }

    public function headings(): array
    {
        return [
            'No Anggota',
            'Nama',
            'Email',
            'NIK',
            'Alamat',
            'No Telepon',
            'Status',
        ];
    }

    public function map($user): array
    {
        return [
            $user->no_anggota ?? '-',
            $user->name,
            $user->email,
            $user->nik ?? '-',
            $user->alamat ?? '-',
            $user->no_telepon ?? '-',
            $user->is_active ? 'Aktif' : 'Tidak Aktif',
        ];
    }
}
