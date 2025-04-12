<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Pegawai;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data untuk ringkasan
        $totalBarang = ListBarang::count();
        $totalMasuk = BarangMasuk::sum('jumlah');
        $totalKeluar = BarangKeluar::sum('jumlah');
        $totalPegawai = Pegawai::count();

        // Ambil 5 barang terbaru
        $barang = ListBarang::orderBy('id_barang', 'desc')->take(5)->get();
        $barangTerbaru = BarangMasuk::with('barang')->orderBy('tanggal', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'barang', 'totalBarang', 'totalMasuk', 'totalKeluar', 'totalPegawai'
        ));
    }
}
