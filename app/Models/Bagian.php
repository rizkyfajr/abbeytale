<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;

    protected $table = 'bagian';

    protected $fillable = [
        'nama_bagian',
        'deskripsi'
    ];

    // Relasi dengan model Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_bagian');
    }
}
