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
        Schema::table('riwayat_pembelian_jt', function (Blueprint $table) {
            Schema::rename('riwayat_pembelian_jenis_transaksi_2', 'riwayat_pembelian_jt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_transaksi_jt', function (Blueprint $table) {
            //
        });
    }
};
