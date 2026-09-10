<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('data_pertanahan', function (Blueprint $table) {
            $table->string('nomor_sertifikat')->nullable()->after('peta_spasial');
        });
    }

    public function down(): void
    {
        Schema::table('data_pertanahan', function (Blueprint $table) {
            $table->dropColumn('nomor_sertifikat');
        });
    }
};
