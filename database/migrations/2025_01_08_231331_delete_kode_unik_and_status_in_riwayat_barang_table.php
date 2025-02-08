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
        $table->boolean('bukti_terima')->default(false)->after('kode_unik'); // Kolom bukti_terima default false
    });
}

public function down()
{
    Schema::table('riwayat_barang', function (Blueprint $table) {
        $table->dropColumn('bukti_terima');
    });
}
};
