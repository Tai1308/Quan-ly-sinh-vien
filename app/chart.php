<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class chart extends Model
{
    public function countIntensiveCourse()
    {
        return  DB::table('course_detail')
                ->where('course_detail.category_id', '=', 1)
                ->count();
    }
    public function countFoundationCourse()
    {
        return  DB::table('course_detail')
                ->where('course_detail.category_id', '=', 2)
                ->count();
    }
    public function countPreCourse()
    {
        return  DB::table('course_detail')
                ->where('course_detail.category_id', '=', 3)
                ->count();
    }
    public function countIk1Course()
    {
        return  DB::table('course_detail')
                ->where('course_detail.category_id', '=', 4)
                ->count();
    }
    public function countIk2Course()
    {
        return  DB::table('course_detail')
                ->where('course_detail.category_id', '=', 5)
                ->count();
    }
    public function countGrammarCourse()
    {
        return  DB::table('course_detail')
                ->where('course_detail.category_id', '=', 6)
                ->count();
    }

}
