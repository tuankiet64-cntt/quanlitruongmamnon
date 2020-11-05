<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createphuhuynh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuhuynh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahs');
            $table->string('hovaten');
            $table->string('sdt');
            $table->string('email');
            $table->string('quanhe');
            $table->date('ngaysinh');
            $table->string('nghenghiep');
            $table->string('tendonvi');
            $table->foreign('mahs')->references('id')->on('hocsinh');
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
        Schema::dropIfExists('phuhuynh');
    }
}
