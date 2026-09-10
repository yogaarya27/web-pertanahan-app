<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_services', function (Blueprint $table) {

            $table->id();

            $table->string('icon')->nullable();

            $table->string('nama_layanan');

            $table->string('slug')->unique();

            $table->text('deskripsi')->nullable();

            $table->longText('persyaratan')->nullable();

            $table->longText('prosedur')->nullable();

            $table->string('estimasi_waktu')->nullable();

            $table->string('biaya')->default('Gratis');

            $table->string('warna')->default('blue');

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_services');
    }
};