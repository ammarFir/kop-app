@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 mt-5">
                    <div class="card-body p-5 text-center">
                        <h3 class="mb-4 fw-bold">Verifikasi Email</h3>

                        <p class="text-muted mb-4">
                            Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi alamat email Anda dengan
                            mengklik link yang kami kirimkan ke email Anda.
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success">
                                Link verifikasi baru telah dikirim ke alamat email Anda.
                            </div>
                        @endif

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Kirim Ulang Email Verifikasi</button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
