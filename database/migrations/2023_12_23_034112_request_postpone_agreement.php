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
        Schema::create('requestPostponeAgreement', function (Blueprint $table) {
            $table->string('rpa_id');
            $table->primary('rpa_id');  
            $table->string('nim_mahasiswa');
            $table->string('berkas');
            $table->string('lastUpdatedBy');
            $table->timestamps();
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
