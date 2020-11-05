<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NKnhaphoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Nknhaphoc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tenhs');
            $table->date('ngaysinh');
            $table->integer('gioitinh');
            $table->string('hokhau');
            $table->string('diachi');
            $table->string('suckhoehientai');
            $table->string('hotenbo');
            $table->string('sdtbo');
            $table->string('emailbo');
            $table->string('hotenme');
            $table->string('sdtme');
            $table->string('emailme');
            $table->string('hovatenph');
            $table->string('sdtph');
            $table->string('emailph');
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
        Schema::dropIfExists('Nknhaphoc');
    }
}
