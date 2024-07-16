<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class list_time extends Model
{
    protected $table = "studytime";
    public $timestamps = false; 

    public function getListStudyTime()
    {
        return  DB::table('studytime')->orderBy('id','asc')->get();
    }

    public function getListStudyShift()
    {
        return  DB::table('studyshift')->orderBy('id','asc')->get();
    }

    public function insertStudyTime($name_studyTime, $detail_studyTime, $user_created)
    {
        return  DB::table('studytime')->insert([
        											'name_studyTime' => $name_studyTime,
        											'detail_studyTime' => $detail_studyTime,
        											'user_created' => $user_created
        										]);
    }

    public function insertStudyShift($name_studyShift, $start_time, $end_time, $user_created)
    {
        return  DB::table('studyshift')->insert([
                                                    'name_studyShift' => $name_studyShift,
                                                    'start_time' => $start_time,
                                                    'end_time' => $end_time,
                                                    'user_created' => $user_created
                                                ]);
    }
}
