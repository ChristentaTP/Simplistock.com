<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangKeluar extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    
    protected $table = 'barang_keluar';
    protected $primaryKey = 'id_keluar';
    public $timestamps = false;
    protected $keyType = 'string'; #Tambahan
    
    protected $fillable = [
        'id_barang', 
        'tanggal', 
        'jumlah', 
        'penerima', 
        'id_admin'
    ];
    
    // Relasi ke list barang
    public function barang()
    {
        return $this->belongsTo(ListBarang::class, 'id_barang', 'id_barang');
    }
    
    // Relasi ke pegawai (penerima)
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'penerima', 'id_user');
    }
    
    // Relasi ke admin
    public function admin()
    {
        return $this->belongsTo(AdminGudang::class, 'id_admin', 'id_admin');
    }
}