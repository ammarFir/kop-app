@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <!-- Header Section -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm mb-4"
                    style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); color: white; border-radius: 16px;">
                    <div class="card-body p-5" style="border-radius: 16px;">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <p class="mb-1 text-white-50 small">Selamat datang kembali</p>
                                <h3 class="fw-bold mb-1">{{ Auth::user()->name }}</h3>
                                <span
                                    class="badge bg-light text-dark">{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</span>
                            </div>
                            <div class="text-end">
                                <p class="mb-0 text-white-50 small">
                                    <i class="fas fa-calendar-alt me-1"></i> {{ now()->format('d M Y') }}
                                </p>
                                <p class="mb-0 text-white-50 small">
                                    <i class="fas fa-clock me-1"></i> {{ now()->format('H:i') }} WITA
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4">
            @if (Auth::user()->role == 'super_admin')
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-primary bg-opacity-10 text-primary mb-2">Total</span>
                                    <h6 class="text-muted mb-1">Front Office</h6>
                                    <h2 class="fw-bold mb-0">{{ $totalFO }}</h2>
                                </div>
                                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                    <i class="fas fa-users-cog fs-2 text-primary"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                            <a href="{{ route('fo.index') }}" class="text-decoration-none small fw-semibold">
                                Kelola FO <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-success bg-opacity-10 text-success mb-2">Total</span>
                                    <h6 class="text-muted mb-1">Anggota</h6>
                                    <h2 class="fw-bold mb-0">{{ $totalAnggota }}</h2>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                    <i class="fas fa-users fs-2 text-success"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                            <a href="{{ route('anggota.index') }}" class="text-decoration-none small fw-semibold">
                                Kelola Anggota <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @elseif(Auth::user()->role == 'fo')
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 12px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-success bg-opacity-10 text-success mb-2">Total</span>
                                    <h6 class="text-muted mb-1">Anggota Terdaftar</h6>
                                    <h2 class="fw-bold mb-0">{{ $totalAnggota }}</h2>
                                </div>
                                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                                    <i class="fas fa-users fs-2 text-success"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0 pt-0 pb-3">
                            <a href="{{ route('anggota.index') }}" class="text-decoration-none small fw-semibold">
                                Kelola Anggota <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3"><i class="fas fa-bolt me-2"></i>Aksi Cepat</h6>
                        <div class="d-flex flex-wrap gap-3">
                            @if (Auth::user()->role == 'super_admin')
                                <a href="{{ route('fo.create') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-plus me-1"></i>Tambah FO
                                </a>
                            @endif
                            @if (Auth::user()->role == 'fo' || Auth::user()->role == 'super_admin')
                                <a href="{{ route('anggota.create') }}" class="btn btn-outline-success btn-sm">
                                    <i class="fas fa-user-plus me-1"></i>Tambah Anggota
                                </a>
                                <a href="{{ route('anggota.export') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-file-excel me-1"></i>Export Excel
                                </a>
                            @endif
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-dark btn-sm">
                                <i class="fas fa-user-cog me-1"></i>Edit Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
