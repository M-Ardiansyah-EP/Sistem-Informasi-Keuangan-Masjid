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
        Schema::create('rabs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('periode');
            $table->enum('kategori', ['pemasukan', 'pengeluaran']);
            $table->string('jenis');
            $table->longText('keterangan')->nullable();
            $table->biginteger('jumlah');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rabs');
    }
};
