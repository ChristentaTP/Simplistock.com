@extends('layout')

@section('content')
<div class="text-center text-white mb-10">
  <h2 class="text-3xl font-bold bg-white/10 p-4 rounded-xl inline-block">Dashboard Pegawai</h2>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
  <div class="bg-blue-600 p-6 rounded-xl shadow-lg text-center">
    <h3 class="text-lg font-semibold">Total Barang</h3>
    <p class="text-3xl font-bold mt-2">{{ $totalBarang }}</p>
  </div>
</div>

<div class="mt-12 bg-white text-black rounded-xl overflow-hidden shadow-lg">
  <div class="bg-gray-800 text-white px-6 py-3 font-semibold">5 Barang Terbaru</div>
  <table class="w-full text-sm text-left">
    <thead class="bg-gray-100 text-gray-700">
      <tr>
        <th class="px-6 py-3">#</th>
        <th class="px-6 py-3">Nama Barang</th>
        <th class="px-6 py-3">Stok</th>
        <th class="px-6 py-3">Kategori</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach($barangs->take(5) as $index => $barang)
      <tr>
        <td class="px-6 py-4">{{ $index + 1 }}</td>
        <td class="px-6 py-4">{{ $barang->nama_barang }}</td>
        <td class="px-6 py-4">{{ $barang->jumlah }}</td>
        <td class="px-6 py-4">{{ $barang->kategori ?? '-' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
