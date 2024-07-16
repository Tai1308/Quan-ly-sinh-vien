<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterCourseTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_course_teacher', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('courseId');
            $table->foreign('courseId')->references('id')->on('course_detail')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('teacherId');
            $table->foreign('teacherId')->references('teacher_id')->on('teacher')
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
        Schema::dropIfExists('register_course_teacher');
    }
}
