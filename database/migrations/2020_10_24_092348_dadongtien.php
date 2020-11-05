<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dadongtien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dongtien', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idhs');
            $table->json('idphi');
            $table->foreign('idhs')->references('id')->on('hocsinh');
            $table->unsignedBigInteger('idcanbo');
            $table->foreign('idcanbo')->references('id')->on('users');
            $table->string('tongtien');
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
        Schema::dropIfExists('dongtien');
    }
}
