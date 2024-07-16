<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_question');
            $table->foreign('id_question')->references('id')->on('subject_question')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_student');
            $table->foreign('id_student')->references('student_id')->on('student')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('answer');
            $table->string('answer_writting');
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
        Schema::dropIfExists('history');
    }
}
