<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StatusPegawai;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'is_admin' => '1',
            'password' => bcrypt('admin'),
        ]);

        User::factory()->create([
            'name' => 'pelanggan',
            'email' => 'pelanggan@mail.com',
            'is_admin' => '0',
            'password' => bcrypt('pelanggan'),
        ]);

        StatusPegawai::factory()->create([
            'nama_status' => 'Tetap',
            'deskripsi' => 'Status pegawai Tetap',
        ]);

        StatusPegawai::factory()->create([
                'nama_status' => 'Kontrak',
                'deskripsi' => 'Status pegawai kontrak',
        ]);
    }
}
