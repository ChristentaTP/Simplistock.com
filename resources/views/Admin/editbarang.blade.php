@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded-xl p-6">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Edit Barang</h3>

    {{-- Alert jika ada error --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-center">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.barang.update', $barang->id_barang) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama_barang" class="block text-gray-700 font-medium mb-2">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" 
                   value="{{ old('nama_barang', $barang->nama_barang) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500" 
                   required>
        </div>

        <div class="mb-4">
            <label for="tipe" class="block text-gray-700 font-medium mb-2">Tipe</label>
            <input type="text" id="tipe" name="tipe" 
                   value="{{ old('tipe', $barang->tipe) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500" 
                   required>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" 
                   value="{{ old('jumlah', $barang->jumlah) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500" 
                   required>
        </div>

        <div class="mb-6">
            <label for="keterangan" class="block text-gray-700 font-medium mb-2">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan" 
                   value="{{ old('keterangan', $barang->keterangan) }}" 
                   class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500" 
                   required>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.listbarang') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
