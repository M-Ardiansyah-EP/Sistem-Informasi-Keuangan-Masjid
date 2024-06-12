<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePengeluaranTable extends Migration
{
    public function up()
    {
        Schema::create('pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->timestamps();
        });

        DB::table('pengeluaran')->insert([
            ['jenis' => 'kebersihan_keamanan'],
            ['jenis' => 'beban_operasional'],
            ['jenis' => 'konsumsi'],
            ['jenis' => 'perawatan'],
            ['jenis' => 'pengajian'],
            ['jenis' => 'insidental']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('pengeluaran');
    }
}
