<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [ 'user_id', 'nama','email', 'telepon', 'jenis_kelamin', 'tgl_lahir', 'alamat'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
