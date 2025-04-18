@extends('layout')
@section('content')    
<!-- Main Content -->
<main class="container mx-auto px-4 pt-32 pb-20 max-w-6xl"> <!-- pt-32 to accommodate navbar and running text -->
   <h2 class="text-3xl font-bold mb-6 text-center text-white">Data Barang</h2>

   <!-- Tombol Tambah - Centered -->
   <div class="mb-4 text-center">
     <button onclick="document.getElementById('formModal').classList.remove('hidden')" 
             class="bg-yellow-400 text-black px-6 py-2 rounded-full font-semibold hover:bg-yellow-300 transition">
       + Tambah Barang
     </button>
   </div>

   <!-- Tabel Data - Centered Container -->
   <div class="overflow-y-auto max-h-[500px] bg-white rounded-xl shadow-lg">
     <table class="min-w-full text-gray-800">
       <thead class="bg-gray-200 text-gray-700">
         <tr>
           <th class="py-3 px-4 text-center">No</th>
           <th class="py-3 px-4 text-center">Nama Barang</th>
           <th class="py-3 px-4 text-center">Tipe</th>
           <th class="py-3 px-4 text-center">Jumlah</th>
           <th class="py-3 px-4 text-center">Keterangan/Supplier</th>
           <th class="py-3 px-4 text-center">Aksi</th>
         </tr>
       </thead>
       <tbody>
         @forelse ($barangs as $index => $barang)
         <tr class="border-t">
           <td class="py-2 px-4 text-center">{{ $index + 1 }}</td>
           <td class="py-2 px-4 text-center">{{ $barang->nama_barang }}</td>
           <td class="py-2 px-4 text-center">{{ $barang->tipe }}</td>
           <td class="py-2 px-4 text-center">{{ $barang->jumlah }}</td>
           <td class="py-2 px-4 text-center">{{ $barang->keterangan }}</td>
           <td class="py-2 px-4 flex justify-center space-x-2">
             <a href="{{ route('admin.barang.edit', $barang->id_barang) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Edit</a>
             <form action="{{ route('admin.barang.destroy', $barang->id_barang) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?');">
               @csrf
               @method('DELETE')
               <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Hapus</button>
             </form>
           </td>
         </tr>
         @empty
         <tr>
           <td colspan="6" class="py-4 text-center text-gray-500">Tidak ada data barang.</td>
         </tr>
         @endforelse
       </tbody>
     </table>
   </div>
</main>

<!-- Modal Tambah - Centered Content -->
<div id="formModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-[100] px-4">
 <div class="bg-white text-gray-800 p-6 rounded-xl w-full max-w-lg relative shadow-2xl">
   <button onclick="document.getElementById('formModal').classList.add('hidden')" 
           class="absolute top-2 right-3 text-gray-600 hover:text-red-600 text-2xl font-bold">&times;</button>
   <h3 class="text-xl font-bold mb-4 text-center">Tambah Barang</h3>
   <form method="POST" action="{{ route('admin.barang.store') }}">
     @csrf
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Nama Barang</label>
       <input type="text" name="nama_barang" class="w-full px-3 py-2 border rounded text-center" required />
     </div>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Tipe</label>
       <input type="text" name="tipe" class="w-full px-3 py-2 border rounded text-center" required />
     </div>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Jumlah</label>
       <input type="number" name="jumlah" class="w-full px-3 py-2 border rounded text-center" required />
     </div>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Keterangan / Supplier</label>
       <input type="text" name="keterangan" class="w-full px-3 py-2 border rounded text-center" required />
     </div>
     <div class="text-center">
       <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 font-semibold">
         Simpan
       </button>
     </div>
   </form>
 </div>
</div>
@endsection
