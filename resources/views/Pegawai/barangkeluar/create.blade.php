@extends('layout')

@section('content')
<div class="text-center mb-10">
  <h2 class="text-2xl font-bold text-white bg-white/10 p-4 rounded-xl inline-block">Ajukan Pengambilan Barang</h2>
</div>

<div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6 text-gray-800">
  <form action="{{ route('pegawai.barangkeluar.store') }}" method="POST">
    @csrf
    <input type="hidden" name="id_barang" value="{{ $barang->id_barang }}">

    <div class="mb-4">
      <label for="nama_barang" class="block font-semibold mb-1">Nama Barang</label>
      <input type="text" id="nama_barang" class="w-full px-4 py-2 border rounded bg-gray-100" value="{{ $barang->nama_barang }}" disabled>
    </div>

    <div class="mb-4">
      <label for="jumlah" class="block font-semibold mb-1">Jumlah Barang</label>
      <input type="number" id="jumlah" name="jumlah" class="w-full px-4 py-2 border rounded" min="1" max="{{ $barang->jumlah }}" required>
    </div>

    <div class="mb-6">
      <label for="penerima" class="block font-semibold mb-1">Penerima (ID Pegawai)</label>
      <input type="text" id="penerima" name="penerima" class="w-full px-4 py-2 border rounded" value="{{ session('user_id') }}" required>
    </div>

    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">
      Ajukan
    </button>
  </form>
</div>
@endsection
