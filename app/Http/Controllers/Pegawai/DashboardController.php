<?php

namespace App\Http\Controllers\Pegawai;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ListBarang;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = ListBarang::query();

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('keterangan')) {
            $query->where('keterangan', $request->keterangan);
        }

        $barangs = $query->get();

        return view('pegawai.dashboard', compact('barangs'));
    }
}
