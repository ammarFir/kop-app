<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-2">Role: <span class="font-bold">{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</span></p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                        @if(Auth::user()->role == 'super_admin')
                            <div class="bg-blue-100 p-4 rounded-lg">
                                <p class="text-sm text-blue-600">Total FO</p>
                                <p class="text-2xl font-bold">{{ $totalFO }}</p>
                            </div>
                            <div class="bg-green-100 p-4 rounded-lg">
                                <p class="text-sm text-green-600">Total Anggota</p>
                                <p class="text-2xl font-bold">{{ $totalAnggota }}</p>
                            </div>
                        @elseif(Auth::user()->role == 'fo')
                            <div class="bg-green-100 p-4 rounded-lg">
                                <p class="text-sm text-green-600">Total Anggota</p>
                                <p class="text-2xl font-bold">{{ $totalAnggota }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>