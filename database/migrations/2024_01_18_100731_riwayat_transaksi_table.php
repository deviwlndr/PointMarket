<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('riwayat_transaksi', function (Blueprint $table) {
        $table->id('id_transaksi'); // Auto-increment
        $table->unsignedBigInteger('id_jenis_transaksi')->nullable(); // Foreign key
        $table->unsignedBigInteger('id_misi')->nullable(); // Foreign key
        $table->unsignedBigInteger('id_barang')->nullable(); // Foreign key
        $table->unsignedBigInteger('id')->nullable();
        $table->integer('npm');
        $table->string('nama_transaksi');
        $table->integer('point');
        $table->dateTime('tanggal_pembelian');
        $table->timestamps();

        $table->foreign('id_jenis_transaksi')->references('id_jenis_transaksi')->on('jenis_transaksi');
        $table->foreign('id_misi')->references('id_misi')->on('misi_tambahan');
        $table->foreign('id_barang')->references('id_barang')->on('barang_project');
        $table->foreign('id')->references('id')->on('mahasiswa');
    });
}

public function down()
{
    Schema::table('riwayat_transaksi', function (Blueprint $table) {
        $table->renameColumn('transaksi', 'nama_transaksi');
    });
}
};
