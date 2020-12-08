<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createrecordluong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recordluong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idgv');
            $table->foreign('idgv')->references('id')->on('giaovien');
            $table->integer('ngaylamviec');
            $table->integer('luongngay');
            $table->integer('tongtien');
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
        Schema::dropIfExists('recordluong');
    }
}
