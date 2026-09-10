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
            // Modify columns to accept file paths
            $table->string('bukti_perolehan')->nullable()->change();
            $table->string('penyerahan_ke_bagian_aset')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_pertanahan', function (Blueprint $table) {
            $table->string('bukti_perolehan')->nullable(false)->change();
            $table->string('penyerahan_ke_bagian_aset')->nullable()->change();
        });
    }
};
