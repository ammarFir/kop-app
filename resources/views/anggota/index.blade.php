@extends('layouts.app')
@section('title', 'Data Anggota')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Data Anggota</h3>
                        <div>
                            <a href="{{ route('anggota.create') }}" class="btn btn-primary btn-sm">
                                + Tambah Anggota
                            </a>
                            <a href="{{ route('anggota.export') }}" class="btn btn-success btn-sm">
                                📥 Export Excel
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <!-- Form Pencarian -->
                        <form method="GET" action="{{ route('anggota.index') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" placeholder="Cari nama, email, no anggota, NIK..."
                                    value="{{ request('search') }}" class="form-control">
                                <button type="submit" class="btn btn-primary">Cari</button>
                                @if (request('search'))
                                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Reset</a>
                                @endif
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Anggota</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($anggotaList as $key => $anggota)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $anggota->no_anggota ?? '-' }}</td>
                                            <td>{{ $anggota->name }}</td>
                                            <td>{{ $anggota->email }}</td>
                                            <td>{{ $anggota->nik ?? '-' }}</td>
                                            <td>{{ $anggota->alamat ?? '-' }}</td>
                                            <td>{{ $anggota->no_telepon ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('anggota.edit', $anggota->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Belum ada data anggota</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-3">
                            {{ $anggotaList->onEachSide(1)->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
