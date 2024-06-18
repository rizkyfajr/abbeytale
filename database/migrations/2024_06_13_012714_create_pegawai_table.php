<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('email')->unique();
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('jabatan');
            $table->integer('id_status_pegawai');
            $table->integer('id_bagian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
