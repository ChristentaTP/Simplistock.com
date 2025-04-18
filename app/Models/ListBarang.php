<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // tambahan

class ListBarang extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes; // tambahan

    protected $table = 'list_barang'; // nama tabel di database
    protected $primaryKey = 'id_barang'; // primary key custom
    public $timestamps = false; // karena tabel tidak pakai created_at / updated_at
    protected $keyType = 'string';

    protected $fillable = [
        'nama_barang',
        'tipe',
        'jumlah',
        'keterangan',
        'tanggal_masuk' 
    ];
     // Relasi ke barang masuk
     public function barangMasuk()
{
    return $this->hasMany(BarangMasuk::class, 'id_barang', 'id_barang')
                ->whereNull('deleted_at'); // abaikan yang sudah di-soft delete
}

// Relasi ke barang keluar
public function barangKeluar()
{
    return $this->hasMany(BarangKeluar::class, 'id_barang', 'id_barang')
                ->whereNull('deleted_at');
}
}
