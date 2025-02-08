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
    Schema::table('riwayat_barang', function (Blueprint $table) {
        // Mengizinkan nilai NULL untuk kolom bukti_terima
        $table->string('bukti_terima')->nullable()->change();
    });
}

public function down()
{
    Schema::table('riwayat_barang', function (Blueprint $table) {
        // Kembali ke kondisi semula jika rollback migrasi
        $table->string('bukti_terima')->nullable(false)->change();
    });
}

};
