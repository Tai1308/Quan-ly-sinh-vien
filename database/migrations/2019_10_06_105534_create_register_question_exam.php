<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterQuestionExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_question_exam', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_exam');
            $table->foreign('id_exam')->references('id')->on('exam')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_question');
            $table->foreign('id_question')->references('id')->on('subject_question')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('courseId');
            $table->foreign('courseId')->references('id')->on('course_detail')
                ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('register_question_exam');
    }
}
