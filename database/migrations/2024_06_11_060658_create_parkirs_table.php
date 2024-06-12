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
        Schema::create('parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kendaraan');
            $table->string('jenis_kendaraan');
            $table->string('nama');
            $table->date('waktu_masuk');
            $table->date('waktu_keluar')->nullable();
            $table->bigInteger('biaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkirs');
    }
};
