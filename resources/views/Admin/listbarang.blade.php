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
   <div class="overflow-x-auto bg-white rounded-xl shadow-lg mx-auto">
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
         <tr class="border-t">
           <td class="py-2 px-4 text-center">1</td>
           <td class="py-2 px-4 text-center">Laptop</td>
           <td class="py-2 px-4 text-center">Elektronik</td>
           <td class="py-2 px-4 text-center">5</td>
           <td class="py-2 px-4 text-center">Ruang IT</td>
           <td class="py-2 px-4 flex justify-center space-x-2">
             <button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">Edit</button>
             <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Hapus</button>
           </td>
         </tr>
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
   <form>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Nama Barang</label>
       <input type="text" class="w-full px-3 py-2 border rounded text-center" />
     </div>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Tipe</label>
       <input type="text" class="w-full px-3 py-2 border rounded text-center" />
     </div>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Jumlah</label>
       <input type="number" class="w-full px-3 py-2 border rounded text-center" />
     </div>
     <div class="mb-4">
       <label class="block mb-1 font-semibold text-center">Keterangan / Supplier</label>
       <input type="text" class="w-full px-3 py-2 border rounded text-center" />
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