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
        Schema::create('data_pertanahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perumahan');
            $table->string('peruntukan');
            $table->string('luas');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('bukti_perolehan');
            $table->enum('status_saat_ini', ['belum diproses', 'proses pensertifikatan', 'sertifikat terbit'])->default('belum diproses');
            $table->string('penyerahan_ke_bagian_aset')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pertanahan');
    }
};
