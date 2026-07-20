@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mt-5">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold">Lupa Password</h3>
                        <p class="text-center text-muted mb-4">Masukkan email Anda, kami akan kirim link reset password</p>

                        <form method="POST" action="{{ route('password.email') }}">
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

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Kirim Link Reset</button>
                        </form>

                        <div class="text-center mt-3">
                            <p class="text-muted small"><a href="{{ route('login') }}" class="text-decoration-none">Kembali
                                    ke Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
