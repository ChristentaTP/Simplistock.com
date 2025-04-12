<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    
    protected $table = 'pegawai';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_user', 
        'username', 
        'password'
    ];
    
    // Untuk keamanan, jangan sertakan password dalam hasil query
    protected $hidden = [
        'password'
    ];
    
    // Relasi ke barang keluar
    public function barangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'penerima', 'id_user');
    }
}
