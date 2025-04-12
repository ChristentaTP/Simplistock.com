<?php
namespace App\Http\Controllers\Pegawai;

use App\Models\BarangKeluar;
use App\Models\ListBarang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BarangKeluarController extends Controller
{
    public function index()
    {
        // Menampilkan daftar barang dengan ikon edit/pengajuan
        $listBarang = ListBarang::all(); // Ambil data list barang
        return view('pegawai.barangkeluar.index', compact('listBarang'));
    }

    public function create($id)
    {
        // Menampilkan form pengajuan barang keluar
        $barang = ListBarang::findOrFail($id);
        return view('pegawai.barangkeluar.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|exists:list_barang,id_barang',
            'jumlah' => 'required|numeric|min:1',
            'penerima' => 'required|exists:pegawai,id_user',
        ]);

        $barang = ListBarang::find($request->id_barang);

        // Pastikan jumlah yang diambil tidak melebihi stok
        if ($barang->jumlah < $request->jumlah) {
            return back()->withErrors(['jumlah' => 'Jumlah yang diambil tidak boleh melebihi stok yang tersedia.']);
        }

        // Kurangi jumlah barang yang diambil dari stok
        $barang->jumlah -= $request->jumlah;
        $barang->save();

        // Simpan data pengajuan barang keluar
        BarangKeluar::create([
            'id_barang' => $request->id_barang,
            'tanggal' => now(),
            'jumlah' => $request->jumlah,
            'penerima' => $request->penerima,
            'id_admin' => null, // Admin diisi null untuk pegawai
        ]);

        return redirect()->route('pegawai.barangkeluar.index')->with('success', 'Pengajuan barang berhasil!');
    }
}
