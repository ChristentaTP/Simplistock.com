<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ListBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Http\Controllers\Controller;

class TrashController extends Controller
{
    public function index()
    {
        $barangs = ListBarang::onlyTrashed()->get();
        $barangMasuks = BarangMasuk::onlyTrashed()->get();
        $barangKeluars = BarangKeluar::onlyTrashed()->get();

        return view('trash.index', compact('barangs', 'barangMasuks', 'barangKeluars'));
    }

    public function restore($type, $id)
    {
        $model = $this->getModel($type)::onlyTrashed()->findOrFail($id);
        $model->restore();

        return redirect()->back()->with('success', ucfirst($type).' berhasil direstore.');
    }

    public function forceDelete($type, $id)
    {
        $model = $this->getModel($type)::onlyTrashed()->findOrFail($id);
        $model->forceDelete();

        return redirect()->back()->with('success', ucfirst($type).' dihapus permanen.');
    }

    private function getModel($type)
    {
        switch ($type) {
            case 'barang':
                return ListBarang::class;
            case 'barang-masuk':
                return BarangMasuk::class;
            case 'barang-keluar':
                return BarangKeluar::class;
            default:
                abort(404);
        }
    }
}
