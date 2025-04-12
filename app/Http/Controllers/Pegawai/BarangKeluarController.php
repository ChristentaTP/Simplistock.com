<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\ListBarang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $id_user = Session::get('id_user');
        $riwayat = BarangKeluar::where('penerima', $id_user)->with('barang')->get();
        return view('pegawai.barangkeluar', compact('riwayat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $barang = ListBarang::where('id_barang', $request->id_barang)->first();

        if (!$barang || $barang->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi.');
        }

        $id_keluar = Str::uuid()->toString(); // atau bisa format custom
        $id_user = Session::get('id_user');

        BarangKeluar::create([
            'id_keluar' => $id_keluar,
            'id_barang' => $request->id_barang,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'penerima' => $id_user,
            'id_admin' => null,
        ]);

        // Update stok
        $barang->jumlah -= $request->jumlah;
        $barang->save();

        return back()->with('success', 'Barang berhasil dikeluarkan.');
        if (!$barang || $barang->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi.');
        }
        if (!$barang) {
            return back()->with('error', 'Barang tidak ditemukan.');
        }
        
        if ($barang->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok barang tidak mencukupi.');
        }
         
    }
}
