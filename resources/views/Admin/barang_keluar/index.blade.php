@extends('layout')

@section('content')
<main class="container mx-auto px-4 pt-32 pb-20 max-w-6xl">
    <h2 class="text-3xl font-bold mb-6 text-center text-white">Data Barang Keluar</h2>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- Alert Error --}}
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    {{-- Tombol Tambah - Centered --}}
    <div class="mb-4 text-center">
        <a href="{{ route('admin.barangkeluar.create') }}" 
           class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold hover:bg-yellow-300 transition inline-block">
            + Tambah Barang Keluar
        </a>
    </div>

    {{-- Tabel Data --}}
    <div class="overflow-y-auto max-h-[500px] bg-white rounded-xl shadow-lg">
    <table class="min-w-full text-gray-800">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-3 px-4 text-center">Tanggal</th>
                    <th class="py-3 px-4 text-center">Nama Barang</th>
                    <th class="py-3 px-4 text-center">Jumlah</th>
                    <th class="py-3 px-4 text-center">Penerima</th>
                    <th class="py-3 px-4 text-center">Admin</th>
                    <th class="py-3 px-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barangKeluar as $bk)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="py-2 px-4 text-center">{{ \Carbon\Carbon::parse($bk->tanggal)->format('d-m-Y') }}</td>
                        <td class="py-2 px-4 text-center">{{ $bk->barang->nama_barang ?? 'Barang tidak ditemukan' }}</td>
                        <td class="py-2 px-4 text-center">{{ $bk->jumlah }}</td>
                        <td class="py-2 px-4 text-center">{{ $bk->pegawai->nama_user ?? 'Pegawai tidak ditemukan' }}</td>
                        <td class="py-2 px-4 text-center">{{ $bk->admin->nama_admin ?? 'Admin tidak ditemukan' }}</td>
                        <td class="py-2 px-4 flex justify-center space-x-2">
                            <a href="{{ route('admin.barangkeluar.edit', $bk->id_keluar) }}" 
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">
                                Edit
                            </a>
                            <form action="{{ route('admin.barangkeluar.destroy', $bk->id_keluar) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">Tidak ada data barang keluar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
@endsection