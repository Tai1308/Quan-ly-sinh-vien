<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_registerStudent');
            $table->foreign('id_registerStudent')->references('id')->on('register_course_teacher')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('id_period');
            $table->foreign('id_period')->references('id')->on('period')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('thamgia');
            $table->integer('vang');
            $table->string('lydovang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('period');
    }
}
