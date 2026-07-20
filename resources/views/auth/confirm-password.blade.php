@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mt-5">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4 fw-bold">Konfirmasi Password</h3>
                        <p class="text-center text-muted mb-4">Ini area aman. Harap konfirmasi password Anda sebelum
                            melanjutkan.</p>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Masukkan password Anda" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Konfirmasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
