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
            $table->integer('id_teacher');
            $table->integer('id_studyTime');
            $table->integer('id_studyShift');
            $table->integer('id_userRegister');
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
