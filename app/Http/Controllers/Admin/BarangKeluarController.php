<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\ListBarang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with(['barang', 'pegawai', 'admin'])->orderBy('tanggal', 'desc')->get();
        return view('admin.barang_keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $listBarang = ListBarang::where('jumlah', '>', 0)->get();
        $pegawai = Pegawai::all();
        return view('admin.barang_keluar.create', compact('listBarang', 'pegawai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'jumlah' => 'required|integer|min:1',
            'penerima' => 'required|exists:pegawai,id_user',
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
                'penerima' => $request->penerima,
                'id_admin' => session('id_admin') // Assuming the admin ID is stored in session
            ]);

            // Update stock in list_barang
            $barang->jumlah -= $request->jumlah;
            $barang->save();

            DB::commit();
            return redirect()->route('admin.barangkeluar.index')->with('success', 'Data barang keluar berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $barangKeluar = BarangKeluar::findOrFail($id);
        $listBarang = ListBarang::all();
        $pegawai = Pegawai::all();
        
        return view('admin.barang_keluar.edit', compact('barangKeluar', 'listBarang', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'jumlah' => 'required|integer|min:1',
            'penerima' => 'required|exists:pegawai,id_user',
        ]);

        $barangKeluar = BarangKeluar::findOrFail($id);
        $originalJumlah = $barangKeluar->jumlah;
        $originalIdBarang = $barangKeluar->id_barang;
        
        // Begin transaction
        DB::beginTransaction();
        try {
            // If changing the same item's quantity
            if ($originalIdBarang == $request->id_barang) {
                $barang = ListBarang::findOrFail($request->id_barang);
                
                // Calculate the difference and check if we have enough stock
                $difference = $request->jumlah - $originalJumlah;
                
                if ($difference > 0 && $barang->jumlah < $difference) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['jumlah' => 'Stok tidak mencukupi untuk penambahan jumlah barang keluar'])->withInput();
                }
                
                // Update the stock
                $barang->jumlah -= $difference;
                $barang->save();
            } else {
                // Return original quantity to the original item
                $originalBarang = ListBarang::findOrFail($originalIdBarang);
                $originalBarang->jumlah += $originalJumlah;
                $originalBarang->save();
                
                // Deduct from the new item
                $newBarang = ListBarang::findOrFail($request->id_barang);
                if ($newBarang->jumlah < $request->jumlah) {
                    DB::rollback();
                    return redirect()->back()->withErrors(['jumlah' => 'Stok tidak mencukupi untuk barang yang dipilih'])->withInput();
                }
                
                $newBarang->jumlah -= $request->jumlah;
                $newBarang->save();
            }
            
            // Update barang keluar record
            $barangKeluar->update([
                'id_barang' => $request->id_barang,
                'jumlah' => $request->jumlah,
                'penerima' => $request->penerima
            ]);
            
            DB::commit();
            return redirect()->route('admin.barangkeluar.index')->with('success', 'Data barang keluar berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        // Begin transaction
        DB::beginTransaction();
        try {
            $barangKeluar = BarangKeluar::findOrFail($id);
            
            // Return items to inventory
            $barang = ListBarang::findOrFail($barangKeluar->id_barang);
            $barang->jumlah += $barangKeluar->jumlah;
            $barang->save();
            
            // Delete record
            $barangKeluar->delete();
            
            DB::commit();
            return redirect()->route('admin.barangkeluar.index')->with('success', 'Data barang keluar berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}