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
        Schema::create('tentang_desas', function (Blueprint $table) {
            $table->id();

            // Jumlah penduduk
            $table->integer('populasi')->nullable();

            // Luas wilayah
            $table->string('luas_wilayah')->nullable();

            // Jumlah rumah tangga
            $table->integer('jumlah_rumah_tangga')->nullable();

            // Visi desa
            $table->longText('visi')->nullable();

            // Misi desa
            $table->longText('misi')->nullable();

            // Lokasi desa / embed maps / alamat
            $table->longText('lokasi_desa')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_desas');
    }
};