<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_exam');

            $table->unsignedBigInteger('id_level');
            $table->foreign('id_level')->references('id')->on('level_question')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('courseId');
            $table->foreign('courseId')->references('id')->on('course_detail')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->integer('time');
            $table->integer('quantity_question');
            $table->integer('date_exam');
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
        Schema::dropIfExists('exam');
    }
}
