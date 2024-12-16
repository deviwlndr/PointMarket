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
        Schema::table('users', function (Blueprint $table) {
            // Menambah kolom poin ke tabel users
            $table->integer('level')->default(0); // Default 0, sesuaikan tipe data sesuai kebutuhan
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom poin jika migration dibatalkan
           
            $table->dropColumn('level');
        });
    }
   
};
