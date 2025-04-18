@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8 text-black">
    <h2 class="text-3xl font-bold mb-6 border-b pb-2 text-green-800 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
        </svg>
        Edit Data Barang Masuk
    </h2>

    <form action="{{ route('admin.barangmasuk.update', $barangMasuk->id_masuk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">📦 Nama Barang</label>
            <select name="id_barang" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                @foreach ($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barangMasuk->id_barang == $barang->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">🔢 Jumlah</label>
            <input type="number" name="jumlah" value="{{ $barangMasuk->jumlah }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">✏️ Supplier</label>
            <input type="text" name="keterangan" value="{{ $barangMasuk->keterangan }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.barangmasuk.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
