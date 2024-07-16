<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('startDate');
            $table->date('endDate');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category_course')
                ->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('id_studyTime');
            $table->foreign('id_studyTime')->references('id')->on('studyTime')
                ->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('course_detail');
    }
}
