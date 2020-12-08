<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luongnv', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idgv')->unique();
            $table->integer('songaylamviec');
            $table->integer('sotienhangngay');
            $table->integer('tongtien');
            $table->foreign('idgv')->references('id')->on('giaovien');
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
        Schema::dropIfExists('LuongNV');
    }
}
