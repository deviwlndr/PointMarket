<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id(); // ID unik untuk dosen
            $table->string('kode_dosen')->unique(); // Kode dosen (seperti NIDN)
            $table->string('name'); // Nama dosen
            $table->string('email')->unique(); // Email dosen
            $table->string('telepon')->nullable(); // Nomor telepon (opsional)
            $table->string('foto_profil')->nullable(); // Foto profil dosen (opsional)
            $table->text('alamat')->nullable(); // Alamat (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('dosen');
    }
};
