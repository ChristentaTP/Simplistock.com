<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\ListBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller
{
    public function index(Request $request)
    {
        $query = BarangMasuk::with('barang')->orderBy('tanggal', 'desc');
    
        // Pencarian berdasarkan nama barang atau keterangan
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('barang', function ($sub) use ($request) {
                    $sub->where('nama_barang', 'like', '%' . $request->search . '%');
                })->orWhere('keterangan', 'like', '%' . $request->search . '%');
            });
        }
    
        // Filter berdasarkan barang
        if ($request->filter_barang) {
            $query->where('id_barang', $request->filter_barang);
        }
    
        $barangMasuk = $query->get();
        $listBarang = ListBarang::all();
    
        return view('admin.barang_masuk.index', compact('barangMasuk', 'listBarang'));
    }
    

    public function create()
    {
        $listBarang = ListBarang::all();
        return view('admin.barang_masuk.create', compact('listBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        // Begin transaction
        DB::beginTransaction();
        try {
            // Create barang masuk record
            BarangMasuk::create([
                'id_barang' => $request->id_barang,
                'tanggal' => now(),
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'id_admin' => session('id_admin') // Assuming admin ID is stored in session
            ]);

            // Update stock in list_barang
            $barang = ListBarang::findOrFail($request->id_barang);
            $barang->jumlah += $request->jumlah;
            $barang->save();

            DB::commit();
            return redirect()->route('admin.barangmasuk.index')->with('success', 'Data barang masuk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $barangMasuk = BarangMasuk::findOrFail($id);
        $listBarang = ListBarang::all();
        return view('admin.barang_masuk.edit', compact('barangMasuk', 'listBarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        $barangMasuk = BarangMasuk::findOrFail($id);
        $originalJumlah = $barangMasuk->jumlah;
        $originalIdBarang = $barangMasuk->id_barang;

        // Begin transaction
        DB::beginTransaction();
        try {
            // If changing the same item's quantity
            if ($originalIdBarang == $request->id_barang) {
                $barang = ListBarang::findOrFail($request->id_barang);
                
                // Calculate the difference and update stock
                $difference = $request->jumlah - $originalJumlah;
                $barang->jumlah += $difference;
                $barang->save();
            } else {
                // Return original quantity from the original item
                $originalBarang = ListBarang::findOrFail($originalIdBarang);
                $originalBarang->jumlah -= $originalJumlah;
                $originalBarang->save();
                
                // Add to the new item
                $newBarang = ListBarang::findOrFail($request->id_barang);
                $newBarang->jumlah += $request->jumlah;
                $newBarang->save();
            }
            
            // Update barang masuk record
            $barangMasuk->update([
                'id_barang' => $request->id_barang,
                'jumlah' => $request->jumlah,
                'supplier' => $request->supplier
            ]);
            
            DB::commit();
            return redirect()->route('admin.barangmasuk.index')->with('success', 'Data barang masuk berhasil diperbarui');
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
            $barangMasuk = BarangMasuk::findOrFail($id);
            
            // Adjust inventory
            $barang = ListBarang::findOrFail($barangMasuk->id_barang);
            $barang->jumlah -= $barangMasuk->jumlah;
            
            // Prevent negative stock
            if ($barang->jumlah < 0) {
                DB::rollback();
                return redirect()->back()->with('error', 'Tidak dapat menghapus data karena stok akan menjadi negatif');
            }
            
            $barang->save();
            
            // Delete record
            $barangMasuk->delete();
            
            DB::commit();
            return redirect()->route('admin.barangmasuk.index')->with('success', 'Data barang masuk berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}