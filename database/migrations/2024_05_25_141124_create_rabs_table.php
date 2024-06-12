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
            $table->date('periode');
            $table->enum('kategori', ['pemasukan', 'pengeluaran']);
            $table->enum('jenis', [
                'infaq', 'zakat', 'qurban', 'parkir', 'kontribusi', 'insidental', 
                'kebersihan_keamanan', 'beban_operasional', 'konsumsi', 'perawatan', 'pengajian'
            ]);
            $table->text('keterangan')->nullable();
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
