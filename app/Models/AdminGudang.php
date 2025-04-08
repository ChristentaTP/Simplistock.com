<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminGudang extends Model
{
    use HasFactory;
    
    protected $table = 'admin_gudang';
    protected $primaryKey = 'id_admin';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_admin', 
        'username', 
        'password'
    ];
    
    protected $hidden = [
        'password'
    ];
    
    public function barangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_admin', 'id_admin');
    }
    
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id_admin', 'id_admin');
    }
}
