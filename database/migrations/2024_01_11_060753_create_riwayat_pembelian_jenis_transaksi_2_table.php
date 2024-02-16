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
        Schema::create('riwayat_pembelian_jenis_transaksi_2', function (Blueprint $table) {
            $table->id('id_transaksi_jenis'); // Auto-increment
            $table->unsignedBigInteger('id_jenis_transaksi')->nullable(); // Foreign key
            $table->integer('npm');
            $table->string('nama_transaksi');
            $table->integer('point');
            $table->dateTime('tanggal_pembelian');
            $table->timestamps();

            $table->foreign('id_jenis_transaksi')->references('id_jenis_transaksi')->on('jenis_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelian_jenis_transaksi_2');
    }
};
