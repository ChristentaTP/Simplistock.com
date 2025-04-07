<?php

namespace App\Http\Controllers;

use App\Models\ListBarang;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = ListBarang::all(); // Ambil semua data barang
        return view('data.dashboard', compact('barang'));
    }
}
