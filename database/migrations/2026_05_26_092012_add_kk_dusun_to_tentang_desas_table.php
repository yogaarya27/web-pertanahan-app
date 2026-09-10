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

            $table->integer('jumlah_kk')->nullable();

            $table->integer('jumlah_dusun')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tentang_desas', function (Blueprint $table) {

            $table->dropColumn([
                'jumlah_kk',
                'jumlah_dusun',
            ]);

        });
    }
};