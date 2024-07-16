<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodTable extends Migration
{
    /**
     *            
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('period');

            $table->unsignedBigInteger('courseId');
            $table->foreign('courseId')->references('id')->on('course_detail')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('teacherId');
            $table->foreign('teacherId')->references('teacher_id')->on('teacher')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('skill');
            $table->date('date_study');

            $table->unsignedBigInteger('id_studyShift');
            $table->foreign('id_studyShift')->references('id')->on('studyShift')
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
        Schema::dropIfExists('period');
    }
}
