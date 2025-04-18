<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //tambahan

class BarangMasuk extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes; //tambahan
    
    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_masuk';
    public $timestamps = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_masuk',
        'id_barang', 
        'tanggal', 
        'jumlah', 
        'keterangan', 
        'id_admin'
    ];
    
    // Relasi ke list barang
    public function barang()
    {
        return $this->belongsTo(ListBarang::class, 'id_barang', 'id_barang');
    }
    
    // Relasi ke admin
    public function admin()
    {
        return $this->belongsTo(AdminGudang::class, 'id_admin', 'id_admin');
    }
}
