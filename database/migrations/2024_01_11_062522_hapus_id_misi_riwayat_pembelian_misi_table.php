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
        Schema::table('riwayat_pembelian_misi', function (Blueprint $table) {
            $table->integer('point')->after('nama_misi');
        });
         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
