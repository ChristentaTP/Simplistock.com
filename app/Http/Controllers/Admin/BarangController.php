<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ListBarang;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    public function index()
    {
        $barangs = ListBarang::all(); // ambil semua data barang
        return view('admin.listbarang', compact('barangs'));
     }
     public function edit($id) //tambahan
     {
         $barang = ListBarang::findOrFail($id);
         return view('admin.editbarang', compact('barang'));
     }

     public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'tipe' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:0',
        'keterangan' => 'required|string|max:255',
    ]);

    // Ambil data barang berdasarkan ID
    $barang = ListBarang::findOrFail($id);

    // Update data
    $barang->update([
        'nama_barang' => $request->nama_barang,
        'tipe' => $request->tipe,
        'jumlah' => $request->jumlah,
        'keterangan' => $request->keterangan,
    ]);

    // Redirect kembali ke halaman list barang dengan pesan sukses
    return redirect()->route('admin.listbarang')->with('success', 'Data barang berhasil diperbarui.');
}
public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_barang' => 'required|string|max:255',
        'tipe' => 'required|string|max:255',
        'jumlah' => 'required|integer|min:0',
        'keterangan' => 'required|string|max:255',
    ]);

    // Simpan data ke database
    ListBarang::create([
        'nama_barang' => $request->nama_barang,
        'tipe' => $request->tipe,
        'jumlah' => $request->jumlah,
        'keterangan' => $request->keterangan,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('admin.listbarang')->with('success', 'Barang berhasil ditambahkan.');
}

public function destroy($id)
{
    $barang = ListBarang::findOrFail($id);
    $barang->delete(); // soft delete

    return redirect()->route('admin.listbarang')->with('success', 'Barang berhasil dihapus (soft delete).');
}


}
