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
        Schema::table('kas', function (Blueprint $table) {
            $table->boolean('disetujui')->default(false)->after('saldo_akhir');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('kas', function (Blueprint $table) {
            $table->dropColumn('disetujui');
        });
    }
};
