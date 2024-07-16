<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DocumentCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_course', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('courseId');
            $table->foreign('courseId')->references('id')->on('course_detail')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('detail');
            $table->date('date_post');
            $table->string('file');
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
        Schema::dropIfExists('document_course');
    }
}
