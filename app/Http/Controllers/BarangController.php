<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListBarang;

class BarangController extends Controller
{
    public function index()
    {
        $barang = ListBarang::all();
        return view('data.databarang', compact('barang'));
    }

    public function store(Request $request)
    {
        $barang = ListBarang::create($request->all());
        return response()->json(['message' => 'Barang ditambahkan!', 'data' => $barang]);
    }

    public function update(Request $request, $id)
    {
        $barang = ListBarang::findOrFail($id);
        $barang->update($request->all());
        return response()->json(['message' => 'Barang diperbarui!', 'data' => $barang]);
    }

    public function destroy($id)
    {
        $barang = ListBarang::findOrFail($id);
        $barang->delete();
        return response()->json(['message' => 'Barang dihapus!']);
    }
}
