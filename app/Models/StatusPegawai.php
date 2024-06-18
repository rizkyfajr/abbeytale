<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPegawai extends Model
{
    use HasFactory;

    protected $table = 'status_pegawai';

    protected $fillable = [
        'nama_status',
        'deskripsi'
    ];

    // Relasi dengan model Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_status_pegawai');
    }
}
