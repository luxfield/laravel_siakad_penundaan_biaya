<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pencairan_dana', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('name');
            $table->date('tanggal');
            $table->integer('dana');
            $table->string('keterangan');
            $table->string('disetujui');
            $table->string('diteruskan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
