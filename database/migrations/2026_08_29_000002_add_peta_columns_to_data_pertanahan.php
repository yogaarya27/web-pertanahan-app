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
        Schema::table('data_pertanahan', function (Blueprint $table) {
            // Peta Bidang - untuk file gambar
            $table->string('peta_bidang')->nullable()->after('penyerahan_ke_bagian_aset');
            
            // Peta Spasial - untuk link URL
            $table->text('peta_spasial')->nullable()->after('peta_bidang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_pertanahan', function (Blueprint $table) {
            $table->dropColumn(['peta_bidang', 'peta_spasial']);
        });
    }
};
