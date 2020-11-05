<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Diemdanh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diemdanh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idhs');
            $table->foreign('idhs')->references('id')->on('hocsinh');
            $table->unsignedBigInteger('id_lichday');
            $table->foreign('id_lichday')->references('id')->on('lichday');
            $table->string('chuthich')->nullable();
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
        Schema::dropIfExists('diemdanh');
    }
}
