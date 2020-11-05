<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocsinh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocsinh', function (Blueprint $table) {
            $table->id();
            $table->string('hovaten');
            $table->date('ngaysinh');
            $table->integer('gioitinh');
            $table->string('hohauthuongtru');
            $table->string('hohautamtru');
            $table->string('dantoc');
            $table->string('tongiao');
            $table->string('diachi');
            $table->date('ngayvaotruong');
            $table->string('tinhtrangsuckhoe');
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
        Schema::dropIfExists('hocsinh');
    }
}
