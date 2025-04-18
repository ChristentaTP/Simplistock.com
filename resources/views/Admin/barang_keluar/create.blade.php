@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8 text-black">
    <h2 class="text-3xl font-bold mb-6 border-b pb-2 text-green-800 flex items-center gap-2">
        ➕ Tambah Barang Keluar
    </h2>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.barangkeluar.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">📦 Nama Barang</label>
            <select name="id_barang" class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">🔢 Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">👤 Penerima</label>
            <select name="penerima" class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <option value="">-- Pilih Pegawai --</option>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_user }}">{{ $p->nama_user }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Simpan
            </button>
            <a href="{{ route('admin.barangkeluar.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
