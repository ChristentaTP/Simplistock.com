@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-md rounded-xl p-6">
    <h3 class="text-2xl font-semibold text-gray-800 mb-6">Edit Data Barang Masuk</h3>

    <form action="{{ route('admin.barangmasuk.update', $barangMasuk->id_masuk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="id_barang" class="block text-gray-700 font-medium mb-2">Nama Barang</label>
            <select name="id_barang" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                @foreach ($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barangMasuk->id_barang == $barang->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="jumlah" class="block text-gray-700 font-medium mb-2">Jumlah</label>
            <input type="number" name="jumlah" value="{{ $barangMasuk->jumlah }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-6">
            <label for="supplier" class="block text-gray-700 font-medium mb-2">Supplier</label>
            <input type="text" name="supplier" value="{{ $barangMasuk->keterangan }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-800 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Update</button>
            <a href="{{ route('admin.barangmasuk.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
