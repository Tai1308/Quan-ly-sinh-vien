<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_course_student', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('courseId');
            $table->foreign('courseId')->references('id')->on('course_detail')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('studentId');
            $table->foreign('studentId')->references('student_id')->on('student')
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
        Schema::dropIfExists('register_course_student');
    }
}
