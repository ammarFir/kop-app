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

        // Data untuk dashboard
        $totalFO = User::where('role', 'fo')->count();
        $totalAnggota = User::where('role', 'anggota')->count();

        return view('dashboard', compact('user', 'role', 'totalFO', 'totalAnggota'));
    }
}
