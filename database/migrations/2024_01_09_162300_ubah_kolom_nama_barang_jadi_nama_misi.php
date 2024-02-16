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
        Schema::table('misi_tambahan', function (Blueprint $table) {
            $table->string('nama_barang')->after('nama_misi');
            $table->dropColumn('nama_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('misi_tambahan', function (Blueprint $table) {
            $table->string('nama_barang')->after('nama_misi');
            $table->dropColumn('nama_barang');
        });
    }
};
