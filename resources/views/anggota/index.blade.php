<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (Auth::user()->role == 'fo' || Auth::user()->role == 'super_admin')
                        <a href="{{ route('anggota.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mb-4 inline-block">
                            + Tambah Anggota
                        </a>
                    @endif

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border p-2 text-left">No</th>
                                    <th class="border p-2 text-left">No Anggota</th>
                                    <th class="border p-2 text-left">Nama</th>
                                    <th class="border p-2 text-left">Email</th>
                                    <th class="border p-2 text-left">NIK</th>
                                    <th class="border p-2 text-left">Alamat</th>
                                    <th class="border p-2 text-left">No Telepon</th>
                                    <th class="border p-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($anggotaList as $key => $anggota)
                                    <tr>
                                        <td class="border p-2">{{ $key + 1 }}</td>
                                        <td class="border p-2">{{ $anggota->no_anggota ?? '-' }}</td>
                                        <td class="border p-2">{{ $anggota->name }}</td>
                                        <td class="border p-2">{{ $anggota->email }}</td>
                                        <td class="border p-2">{{ $anggota->nik ?? '-' }}</td>
                                        <td class="border p-2">{{ $anggota->alamat ?? '-' }}</td>
                                        <td class="border p-2">{{ $anggota->no_telepon ?? '-' }}</td>
                                        <td class="border p-2 text-center">
                                            @if (Auth::user()->role == 'fo' || Auth::user()->role == 'super_admin')
                                                <a href="{{ route('anggota.edit', $anggota->id) }}"
                                                    class="text-blue-600 hover:underline">Edit</a>
                                                <form action="{{ route('anggota.destroy', $anggota->id) }}"
                                                    method="POST" class="inline-block"
                                                    onsubmit="return confirm('Yakin hapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:underline ml-2">Hapus</button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">Tidak ada aksi</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="border p-2 text-center">Belum ada data anggota</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
