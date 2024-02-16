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
        Schema::create('misi_tambahan', function (Blueprint $table) {
            $table->id('id_misi');
            $table->integer('kode_misi')->unique();
            $table->string('nama_misi');
            $table->string('deskripsi');
            $table->integer('harga_point');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('misi_tambahan');
    }
};
