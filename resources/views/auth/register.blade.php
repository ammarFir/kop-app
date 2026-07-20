@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mt-5">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold">Daftar Akun</h3>
                        <p class="text-center text-muted mb-4">Buat akun baru untuk akses sistem</p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Masukkan nama Anda" required autofocus>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="contoh@email.com" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Minimal 8 karakter" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label fw-semibold">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Ulangi password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Daftar</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-muted small">Sudah punya akun? <a href="{{ route('login') }}"
                                    class="text-decoration-none">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
