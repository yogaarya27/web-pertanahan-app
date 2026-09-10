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
        Schema::table('tentang_desas', function (Blueprint $table) {

            $table->longText('sejarah_desa')->nullable();

            $table->string('gambar_sejarah')->nullable();

            $table->string('batas_utara')->nullable();

            $table->string('batas_timur')->nullable();

            $table->string('batas_selatan')->nullable();

            $table->string('batas_barat')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tentang_desas', function (Blueprint $table) {

            $table->dropColumn([
                'sejarah_desa',
                'gambar_sejarah',
                'batas_utara',
                'batas_timur',
                'batas_selatan',
                'batas_barat',
            ]);

        });
    }
};