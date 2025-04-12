<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListBarang;

class DashboardController extends Controller
{
    public function index()
{
    $barangs = ListBarang::all();
    $totalBarang = $barangs->count();

    return view('pegawai.dashboard', compact('barangs', 'totalBarang'));
}

}