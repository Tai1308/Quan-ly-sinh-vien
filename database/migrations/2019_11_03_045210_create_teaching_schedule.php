<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachingSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teaching_schedule', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_teacher');
            $table->foreign('id_teacher')->references('teacher_id')->on('teacher')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_studyTime');
            $table->foreign('id_studyTime')->references('id')->on('studyTime')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('id_studyShift');
            $table->foreign('id_studyShift')->references('id')->on('studyTime')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('id_userRegister');
            $table->foreign('id_userRegister')->references('id')->on('users')
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
        Schema::dropIfExists('teaching_schedule');
    }
}
