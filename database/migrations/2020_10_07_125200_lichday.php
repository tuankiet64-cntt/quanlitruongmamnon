<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lichday extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichday', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idgv');
            $table->unsignedBigInteger('idlophoc');
            $table->json('ngayday');
            $table->foreign('idgv')->references('id')->on('giaovien');
            $table->foreign('idlophoc')->references('id')->on('lophoc');
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
        Schema::dropIfExists('lichday');
    }
}
