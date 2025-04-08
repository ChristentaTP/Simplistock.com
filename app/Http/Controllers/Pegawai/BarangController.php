<?php
namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\ListBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = ListBarang::all(); // ambil semua data barang
        return view('pegawai.listbarang', compact('barangs'));
    }
}
