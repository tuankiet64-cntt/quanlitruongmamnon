<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createtablechi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cackhoangchi', function (Blueprint $table) {
            $table->id();
            $table->string('tenkhoangchi');
            $table->unsignedBigInteger('idgv');
            $table->foreign('idgv')->references('id')->on('giaovien');
            $table->integer('sotien');
            $table->string('ghichu')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('cackhoangchi');
    }
}
