@extends('layout')

@section('content')
<main class="container mx-auto px-4 pt-32 pb-20 max-w-6xl">
  <h2 class="text-3xl font-bold mb-6 text-center text-white">Barang yang Dihapus Sementara</h2>

  <!-- Navigasi balik -->
  <div class="mb-6 text-center">
    <a href="{{ route('admin.listbarang') }}" class="text-yellow-400 hover:underline font-semibold text-sm">
      ← Kembali ke Data Barang
    </a>
  </div>

  <!-- Tabel ListBarang Terhapus -->
  <div class="overflow-x-auto bg-white rounded-xl shadow-lg mx-auto mb-10">
  <h3 class="text-xl font-bold text-black px-4 pt-4">Data Barang Terhapus</h3>
    <table class="min-w-full text-gray-800">
      <thead class="bg-gray-200 text-gray-700">
        <tr>
          <th class="py-3 px-4 text-center">No</th>
          <th class="py-3 px-4 text-center">Nama Barang</th>
          <th class="py-3 px-4 text-center">Tipe</th>
          <th class="py-3 px-4 text-center">Jumlah</th>
          <th class="py-3 px-4 text-center">Keterangan</th>
          <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($barangs as $index => $barang)
        <tr class="border-t hover:bg-gray-50 transition">
          <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
          <td class="py-2 px-4 text-center">{{ $barang->nama_barang ?? '-' }}</td>
          <td class="py-2 px-4 text-center">{{ $barang->tipe ?? '-' }}</td>
          <td class="py-2 px-4 text-center">{{ $barang->jumlah ?? '-' }}</td>
          <td class="py-2 px-4 text-center">{{ $barang->keterangan ?? '-' }}</td>
          <td class="py-2 px-4 flex justify-center space-x-2">
            <form action="{{ route('admin.trash.restore', ['type' => 'barang', 'id' => $barang->getKey()]) }}" method="POST">
              @csrf
              <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm shadow">
                Restore
              </button>
            </form>
            <form action="{{ route('admin.trash.forceDelete', ['type' => 'barang', 'id' => $barang->getKey()]) }}" method="POST" onsubmit="return confirm('Yakin hapus permanen?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm shadow">
                Hapus Permanen
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="py-4 text-center text-gray-500">Tidak ada data barang yang terhapus.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Tabel Barang Masuk Terhapus -->
  <div class="overflow-x-auto bg-white rounded-xl shadow-lg mx-auto mb-10">
  <h3 class="text-xl font-bold text-green-700 px-4 pt-4">Barang Masuk Terhapus</h3>
    <table class="min-w-full text-gray-800">
      <thead class="bg-gray-200 text-gray-700">
        <tr>
          <th class="py-3 px-4 text-center">No</th>
          <th class="py-3 px-4 text-center">Nama Barang</th>
          <th class="py-3 px-4 text-center">Jumlah</th>
          <th class="py-3 px-4 text-center">Keterangan</th>
          <th class="py-3 px-4 text-center">Tanggal</th>
          <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($barangMasuks as $index => $item)
        <tr class="border-t hover:bg-gray-50 transition">
          <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
          <td class="py-2 px-4 text-center">{{ $item->barang->nama_barang ?? '-' }}</td>
          <td class="py-2 px-4 text-center">{{ $item->jumlah }}</td>
          <td class="py-2 px-4 text-center">{{ $item->keterangan }}</td>
          <td class="py-2 px-4 text-center">{{ $item->tanggal }}</td>
          <td class="py-2 px-4 flex justify-center space-x-2">
            <form action="{{ route('admin.trash.restore', ['type' => 'barang-masuk', 'id' => $item->getKey()]) }}" method="POST">
              @csrf
              <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm shadow">
                Restore
              </button>
            </form>
            <form action="{{ route('admin.trash.forceDelete', ['type' => 'barang-masuk', 'id' => $item->getKey()]) }}" method="POST" onsubmit="return confirm('Yakin hapus permanen?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm shadow">
                Hapus Permanen
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="py-4 text-center text-gray-500">Tidak ada data barang masuk yang terhapus.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Tabel Barang Keluar Terhapus -->
  <div class="overflow-x-auto bg-white rounded-xl shadow-lg mx-auto">
  <h3 class="text-xl font-bold text-red-700 px-4 pt-4">Barang Keluar Terhapus</h3>
    <table class="min-w-full text-gray-800">
      <thead class="bg-gray-200 text-gray-700">
        <tr>
          <th class="py-3 px-4 text-center">No</th>
          <th class="py-3 px-4 text-center">Nama Barang</th>
          <th class="py-3 px-4 text-center">Jumlah</th>
          <th class="py-3 px-4 text-center">Penerima</th>
          <th class="py-3 px-4 text-center">Tanggal</th>
          <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($barangKeluars as $index => $item)
        <tr class="border-t hover:bg-gray-50 transition">
          <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
          <td class="py-2 px-4 text-center">{{ $item->barang->nama_barang ?? '-' }}</td>
          <td class="py-2 px-4 text-center">{{ $item->jumlah }}</td>
          <td class="py-2 px-4 text-center">{{ $item->pegawai->nama ?? '-' }}</td>
          <td class="py-2 px-4 text-center">{{ $item->tanggal }}</td>
          <td class="py-2 px-4 flex justify-center space-x-2">
            <form action="{{ route('admin.trash.restore', ['type' => 'barang-keluar', 'id' => $item->getKey()]) }}" method="POST">
              @csrf
              <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-sm shadow">
                Restore
              </button>
            </form>
            <form action="{{ route('admin.trash.forceDelete', ['type' => 'barang-keluar', 'id' => $item->getKey()]) }}" method="POST" onsubmit="return confirm('Yakin hapus permanen?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm shadow">
                Hapus Permanen
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="py-4 text-center text-gray-500">Tidak ada data barang keluar yang terhapus.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</main>
@endsection
