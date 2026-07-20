<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        $totalFO = User::where('role', 'fo')->count();
        $totalAnggota = User::where('role', 'anggota')->count();

        // Debug: tampilkan semua data di view
        return view('dashboard', [
            'user' => $user,
            'role' => $role,
            'totalFO' => $totalFO,
            'totalAnggota' => $totalAnggota,
            'debug' => [
                'totalFO' => $totalFO,
                'totalAnggota' => $totalAnggota,
                'role' => $role,
                'user_name' => $user->name,
            ]
        ]);
    }
}
