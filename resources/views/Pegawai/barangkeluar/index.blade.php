@extends('layout')

@section('content')
<div class="text-center mb-10">
  <h2 class="text-2xl font-bold text-white bg-white/10 p-4 rounded-xl inline-block">Daftar Barang</h2>
</div>

<div class="overflow-x-auto bg-white rounded-xl shadow-lg">
  <table class="w-full text-sm text-left text-gray-700">
    <thead class="bg-gray-800 text-white">
      <tr>
        <th class="px-6 py-3">Nama Barang</th>
        <th class="px-6 py-3">Jumlah</th>
        <th class="px-6 py-3 text-center">Aksi</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
      @foreach ($listBarang as $barang)
      <tr>
        <td class="px-6 py-4">{{ $barang->nama_barang }}</td>
        <td class="px-6 py-4">{{ $barang->jumlah }}</td>
        <td class="px-6 py-4 text-center">
          <a href="{{ route('pegawai.barangkeluar.create', $barang->id_barang) }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm shadow">
            Ajukan Pengambilan
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
