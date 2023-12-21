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
        Schema::create('riwayat_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('npm');
            $table->unsignedBigInteger('kode_pembelian')->unique;
            $table->string('nama_pembelian');
            $table->datetime('tanggal_pembelian');
            $table->timestamps();
            // Definisi foreign key untuk kolom npm
            $table->foreign('npm')->references('npm')->on('users');

            // Definisi foreign key untuk kolom kode_pembelian yang merujuk ke kode_misi
            $table->foreign('kode_pembelian')->references('kode_misi')->on('misitambahan');

            // Definisi foreign key untuk kolom kode_pembelian yang merujuk ke kode pada barangproject
            $table->foreign('kode_pembelian')->references('kode')->on('barangproject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelian');
    }
};
