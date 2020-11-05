<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createhoatdong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoatdong', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iddm');
            $table->string('tenhoatdong');
            $table->string('ngaygiangday');
            $table->string('ghichu')->nullable();
            $table->foreign('iddm')->references('id')->on('danhmuclop');
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
        Schema::dropIfExists('=hoatdong');
    }
}
