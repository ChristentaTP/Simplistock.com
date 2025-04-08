<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\ListBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function create()
    {
        $listBarang = ListBarang::where('jumlah', '>', 0)->get();
        return view('pegawai.barangkeluar', compact('listBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Check if requested amount is available
        $barang = ListBarang::findOrFail($request->id_barang);
        if ($barang->jumlah < $request->jumlah) {
            return redirect()->back()->withErrors(['jumlah' => 'Jumlah barang keluar melebihi stok yang tersedia!'])->withInput();
        }

        // Begin transaction
        DB::beginTransaction();
        try {
            // Create barang keluar record
            BarangKeluar::create([
                'id_barang' => $request->id_barang,
                'tanggal' => now(),
                'jumlah' => $request->jumlah,
                'penerima' => session('id_user'), // Assuming the pegawai ID is stored in session
                'id_admin' => null // Since the pegawai is creating this record, no admin is involved
            ]);

            // Update stock in list_barang
            $barang->jumlah -= $request->jumlah;
            $barang->save();

            DB::commit();
            return redirect()->route('pegawai.listbarang')->with('success', 'Barang berhasil diambil');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}