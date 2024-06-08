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
        Schema::create('pengajuan_dana_proses', function (Blueprint $table) {
            $table->id()->nullable();
            $table->string('name');
            $table->date('tanggal');
            $table->string('berkas');
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
