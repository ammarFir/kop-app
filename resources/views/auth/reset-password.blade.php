@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mt-5">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold">Reset Password</h3>
                        <p class="text-center text-muted mb-4">Masukkan email dan password baru Anda</p>

                        <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $request->email) }}" required autofocus>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password Baru</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Minimal 8 karakter" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi
                                    Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" placeholder="Ulangi password baru" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
