@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mt-5">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold">Login</h3>
                        <p class="text-center text-muted mb-4">Masuk ke akun koperasi Anda</p>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="••••••••" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">Ingat saya</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none small">Lupa
                                        password?</a>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-muted small">Belum punya akun? <a href="{{ route('register') }}"
                                    class="text-decoration-none">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
