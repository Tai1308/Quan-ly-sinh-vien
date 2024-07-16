<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class student extends Model
{
    //
    protected $table = "student";
    public $timestamps = false; 
   	public function checkIdStudent($student_id)
    {
        return  DB::table('student')
                ->where('student.student_id', '=', $student_id)
                ->count();
    }

    public function checkEmailStudent($student_email)
    {
        return  DB::table('student')
                ->where('student.email', '=', $student_email)
                ->count();
    }

}
