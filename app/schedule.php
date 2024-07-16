<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class schedule extends Model
{
    protected $table 	= "teaching_schedule";
    public $timestamps 	= false;

    public function insertTeachingSchedule($id_teacher, $id_studyTime, $id_studyShift, $id_userRegister)
    {
        return  DB::table('teaching_schedule')->insert([
                                                    'id_teacher'      => $id_teacher,
                                                    'id_studyTime'    => $id_studyTime,
                                                    'id_studyShift'   => $id_studyShift,
                                                    'id_userRegister' => $id_userRegister
                                                ]);
    }

    public function getDetailSchedule()
    {
        return  DB::table('teaching_schedule')
        			->join('studyshift', 'studyshift.id', '=', 'teaching_schedule.id_studyShift')
        			->join('studytime', 'studytime.id', '=', 'teaching_schedule.id_studyTime')
        			->join('teacher', 'teacher.teacher_id', '=', 'teaching_schedule.id_teacher')
        			->select('teaching_schedule.id as id_ts','studyshift.name_studyShift as name_studyShift', 'studytime.name_studyTime as name_studyTime', 'teacher.teacher_name as teacher_name','studyshift.start_time as start_time', 'studyshift.end_time as end_time')
        			->get();
    }

    public function getIdTeacher($id_teacher)
    {
        return DB::table('teaching_schedule')
    						->select('teaching_schedule.id_teacher')
    						->where('teaching_schedule.id_teacher', $id_teacher)
    						->get();
    }

    public function getIdStudyTime($id_studyTime, $id_studyShift, $id_teacher)
    {
        return DB::table('teaching_schedule')
    						->select('teaching_schedule.id_studyTime')
    						->where('teaching_schedule.id_studyTime', $id_studyTime)
    						->where('teaching_schedule.id_studyShift', $id_studyShift)
    						->where('teaching_schedule.id_teacher', $id_teacher)
    						->get();
    }
}
