<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListBarang;

class DashboardController extends Controller
{
    public function index()
    {
      
        // Ambil data untuk ringkasan
        $totalBarang = ListBarang::count();

        // Ambil 5 barang terbaru
        $barang = ListBarang::orderBy('id_barang', 'desc')->take(5)->get();

        return view('pegawai.dashboard', compact(
            'barang', 'totalBarang', 
        ));
    }
}

