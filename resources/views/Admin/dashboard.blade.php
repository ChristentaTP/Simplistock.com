@extends('layout')

@section('content')
<main class="container mx-auto px-4 pt-24 pb-20 max-w-7xl">
    <!-- DateTime and User Info -->
    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 mb-6 text-center text-white/90 max-w-2xl mx-auto">
        <p class="text-3xl font-bold mb-12 text-center text-white">Dashboard Admin</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Total Barang Card --}}
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex flex-col items-center">
                <h5 class="text-lg font-semibold mb-2">Total Barang</h5>
                <p class="text-4xl font-bold">{{ $totalBarang }}</p>
            </div>
        </div>

        {{-- Total Masuk Card --}}
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex flex-col items-center">
                <h5 class="text-lg font-semibold mb-2">Total Masuk</h5>
                <p class="text-4xl font-bold">{{ $totalMasuk }}</p>
            </div>
        </div>

        {{-- Total Keluar Card --}}
        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex flex-col items-center">
                <h5 class="text-lg font-semibold mb-2">Total Keluar</h5>
                <p class="text-4xl font-bold">{{ $totalKeluar }}</p>
            </div>
        </div>

        {{-- Total Pegawai Card --}}
        <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-xl shadow-lg p-6 text-white">
            <div class="flex flex-col items-center">
                <h5 class="text-lg font-semibold mb-2">Total Pegawai</h5>
                <p class="text-4xl font-bold">{{ $totalPegawai }}</p>
            </div>
        </div>
    </div>


    {{-- Tabel Barang Terbaru --}}
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gray-800 text-white px-6 py-4">
            <h5 class="text-lg font-semibold">5 Barang Terbaru</h5>
        </div>
        
        <div class="p-6">
            @if ($barang->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">#</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Barang</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Stok</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Kategori</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($barang as $index => $b)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $b->nama_barang }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <span class="px-3 py-1 rounded-full text-sm font-medium
                                            {{ $b->stok > 10 ? 'bg-green-100 text-green-800' : 
                                               ($b->stok > 5 ? 'bg-yellow-100 text-yellow-800' : 
                                                'bg-red-100 text-red-800') }}">
                                            {{ $b->stok }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600">
                                        <span class="px-3 py-1 bg-gray-100 rounded-full">
                                            {{ $b->kategori }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500 text-center py-4">Tidak ada data barang terbaru.</p>
            @endif
        </div>
    </div>
</main>
@endsection
