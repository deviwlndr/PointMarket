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
        Schema::create('barang_project', function (Blueprint $table) {
            $table->id('id_barang');
            $table->integer('kode_barang')->unique();
            $table->string('nama_barang');
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
        Schema::dropIfExists('barang_project');
    }
};
