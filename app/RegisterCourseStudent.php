<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterCourseStudent extends Model
{
    protected $table ="register_course_student";
    public $timestamps = false;


    public function student()
    {
        return $this->hasOne(student::class, 'student_id', 'studentId');
    }
}
