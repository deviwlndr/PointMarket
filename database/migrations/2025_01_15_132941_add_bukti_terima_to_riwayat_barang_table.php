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
            $table->string('bukti_terima')->nullable()->after('kode_unik'); // Menambah kolom bukti_terima setelah kode_unik
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('riwayat_barang', function (Blueprint $table) {
            $table->dropColumn('bukti_terima'); // Menghapus kolom bukti_terima saat rollback
        });
    }
};
