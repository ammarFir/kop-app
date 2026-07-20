@extends('layouts.app')
@section('title', 'Data FO')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Data FO</h3>
                        <a href="{{ route('fo.create') }}" class="btn btn-primary btn-sm">
                            + Tambah FO
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($foList as $key => $fo)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $fo->name }}</td>
                                        <td>{{ $fo->email }}</td>
                                        <td>
                                            @if ($fo->is_active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('fo.edit', $fo->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('fo.destroy', $fo->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data FO</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
