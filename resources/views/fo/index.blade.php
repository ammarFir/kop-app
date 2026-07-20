<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data FO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('fo.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded mb-4 inline-block">
                        + Tambah FO
                    </a>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2 text-left">No</th>
                                <th class="border p-2 text-left">Nama</th>
                                <th class="border p-2 text-left">Email</th>
                                <th class="border p-2 text-left">Status</th>
                                <th class="border p-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($foList as $key => $fo)
                                <tr>
                                    <td class="border p-2">{{ $key + 1 }}</td>
                                    <td class="border p-2">{{ $fo->name }}</td>
                                    <td class="border p-2">{{ $fo->email }}</td>
                                    <td class="border p-2">
                                        <span
                                            class="px-2 py-1 rounded text-white text-sm {{ $fo->is_active ? 'bg-green-500' : 'bg-red-500' }}">
                                            {{ $fo->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td class="border p-2 text-center">
                                        <a href="{{ route('fo.edit', $fo->id) }}"
                                            class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('fo.destroy', $fo->id) }}" method="POST"
                                            class="inline-block" onsubmit="return confirm('Yakin hapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:underline ml-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border p-2 text-center">Belum ada data FO</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
