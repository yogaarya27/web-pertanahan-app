<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();

            // Identitas
            $table->string('nik', 20)->unique();
            $table->string('no_kk', 20);
            $table->string('nama');

            // Jenis Kelamin
            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ]);

            // Data Kelahiran
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir');

            // Alamat
            $table->string('dusun');
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();

            // Agama
            $table->enum('agama', [
                'Islam',
                'Kristen',
                'Katolik',
                'Hindu',
                'Buddha',
                'Konghucu'
            ])->nullable();

            // Pendidikan
            $table->string('pendidikan')->nullable();

            // Pekerjaan
            $table->string('pekerjaan')->nullable();

            // Status Perkawinan
            $table->enum('status_perkawinan', [
                'Belum Kawin',
                'Kawin',
                'Cerai Hidup',
                'Cerai Mati'
            ])->nullable();

            // Status Penduduk
            $table->enum('status_penduduk', [
                'Aktif',
                'Pindah',
                'Meninggal'
            ])->default('Aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};