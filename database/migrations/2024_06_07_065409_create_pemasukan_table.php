<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanTable extends Migration
{
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->timestamps();
        });

        DB::table('pemasukan')->insert([
            ['jenis' => 'infaq'],
            ['jenis' => 'zakat'],
            ['jenis' => 'qurban'],
            ['jenis' => 'parkir'],
            ['jenis' => 'kontribusi'],
            ['jenis' => 'insidental']
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
}
