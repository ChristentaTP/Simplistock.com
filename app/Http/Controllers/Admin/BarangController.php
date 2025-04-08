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

}
