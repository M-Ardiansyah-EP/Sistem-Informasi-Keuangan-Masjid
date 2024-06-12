<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasTable extends Migration
{
    public function up()
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('kategori', ['pemasukan', 'pengeluaran']);
            $table->enum('jenis', [
                'infaq', 'zakat', 'qurban', 'parkir', 'kontribusi', 'insidental', 
                'kebersihan_keamanan', 'beban_operasional', 'konsumsi', 'perawatan', 'pengajian'
            ]);
            $table->text('keterangan')->nullable();
            $table->bigInteger('jumlah');
            $table->bigInteger('saldo_akhir');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kas');
    }
}
