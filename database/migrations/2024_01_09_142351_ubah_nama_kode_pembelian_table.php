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
        Schema::table('riwayat_pembelian', function (Blueprint $table) {
            $table->string('kode_misi')->after('kode_pembelian');
            $table->dropColumn('kode_pembelian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_pembelian', function (Blueprint $table) {
            $table->string('kode_pembelian')->after('kode_misi');
            $table->dropColumn('kode_misi');
        });
    }
};
