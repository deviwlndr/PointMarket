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
        Schema::table('riwayat_transaksi', function (Blueprint $table) {
            $table->string('file_bukti')->nullable()->after('point'); // Untuk menyimpan bukti file
            $table->enum('status', ['pending', 'completed'])->default('pending')->after('file_bukti'); // Untuk status misi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_transaksi', function (Blueprint $table) {
            $table->dropColumn('file_bukti');
        $table->dropColumn('status');
        });
    }
};
