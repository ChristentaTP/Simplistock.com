<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBarang extends Model
{
    use HasFactory;

    protected $table = 'list_barang'; // nama tabel di database

    protected $primaryKey = 'id_barang'; // primary key custom

    protected $fillable = [
        'nama_barang',
        'tipe',
        'jumlah',
        'keterangan',
    ];

    public $timestamps = false; // karena tabel tidak pakai created_at / updated_at
}
