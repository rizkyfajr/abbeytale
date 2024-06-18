<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'jenis_kelamin',
        'alamat',
        'jabatan',
        'id_status_pegawai',
        'id_bagian',
    ];

    // Relasi dengan model StatusPegawai
    public function statusPegawai()
    {
        return $this->belongsTo(StatusPegawai::class, 'id_status_pegawai');
    }

    // Relasi dengan model Bagian
    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'id_bagian');
    }
}
