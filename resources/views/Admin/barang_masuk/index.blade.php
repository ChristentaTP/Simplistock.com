@extends('layout')

@section('content')
<main class="container mx-auto px-4 pt-32 pb-20 max-w-6xl">
    <h2 class="text-3xl font-bold mb-6 text-center text-white">Data Barang Masuk</h2>

    {{-- Alert Messages --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    {{-- Tombol Tambah - Centered --}}
    <div class="mb-6 text-center">
        <a href="{{ route('admin.barangkeluar.create') }}" 
           class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold hover:bg-yellow-300 transition inline-block">
            + Tambah Barang Masuk
        </a>
    </div>

    {{-- Search dan Filter --}}
    <form method="GET" action="{{ route('admin.barangmasuk.index') }}" class="mb-6">
        <div class="flex flex-col md:flex-row justify-center items-center gap-4">
            <div class="w-full md:w-1/3">
            <input type="text" 
                    name="search" 
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-green-400 focus:border-transparent text-black" 
                    placeholder="Cari nama barang atau supplier..." 
                    value="{{ request('search') }}">

            </div>
            <div class="w-full md:w-1/4">

            <select name="filter_barang" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 text-black">
            <option value="">-- Filter Nama Barang --</option>
            @foreach ($listBarang as $barang)
                <option value="{{ $barang->nama_barang }}" {{ request('filter_barang') == $barang->nama_barang ? 'selected' : '' }}>
                     {{ $barang->nama_barang }}
                </option>
            @endforeach
            </select>

            </select>
            </div>
            <button class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition" 
                    type="submit">
                Filter
            </button>
        </div>
    </form>

    {{-- Tabel --}}
    <div class="overflow-y-auto max-h-[500px] bg-white rounded-xl shadow-lg">
    <table class="min-w-full text-gray-800">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-center">Tanggal</th>
                    <th class="py-3 px-4 text-center">Nama Barang</th>
                    <th class="py-3 px-4 text-center">Jumlah</th>
                    <th class="py-3 px-4 text-center">Supplier</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($barangMasuk as $bm)
                <tr class="border-t hover:bg-gray-50">
                    <td class="py-2 px-4 text-center">{{ $bm->tanggal }}</td>
                    <td class="py-2 px-4 text-center">{{ $bm->nama_barang ?? 'Barang tidak ditemukan' }}</td>
                    <td class="py-2 px-4 text-center">{{ $bm->jumlah }}</td>
                    <td class="py-2 px-4 text-center">{{ $bm->keterangan }}</td>
                    <td class="py-2 px-4 flex justify-center space-x-2">
                        <a href="{{ route('admin.barangmasuk.edit', $bm->id_masuk) }}" 
                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                            Edit
                        </a>
                        <form action="{{ route('admin.barangmasuk.destroy', $bm->id_masuk) }}" 
                              method="POST" 
                              class="inline-block" 
                              onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf 
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada data.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection
