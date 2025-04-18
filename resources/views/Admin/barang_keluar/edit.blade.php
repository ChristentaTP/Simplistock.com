@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-8 text-black">
    <h2 class="text-3xl font-bold mb-6 border-b pb-2 text-green-800 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H3" />
        </svg>
        Edit Data Barang Keluar
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

    <form action="{{ route('admin.barangkeluar.update', $barangKeluar->id_keluar) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">📦 Nama Barang</label>
            <select name="id_barang" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                @foreach($listBarang as $barang)
                    <option value="{{ $barang->id_barang }}" {{ $barang->id_barang == $barangKeluar->id_barang ? 'selected' : '' }}>
                        {{ $barang->nama_barang }} (Stok: {{ $barang->jumlah }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-semibold mb-1">🔢 Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', $barangKeluar->jumlah) }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-semibold mb-1">👤 Penerima</label>
            <select name="penerima" class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-green-500" required>
                <option disabled>-- Pilih Penerima --</option>
                @foreach($pegawai as $p)
                    <option value="{{ $p->id_user }}" {{ $barangKeluar->penerima == $p->id_user ? 'selected' : '' }}>
                        {{ $p->nama_user }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.barangkeluar.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded-lg hover:bg-gray-500 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection
