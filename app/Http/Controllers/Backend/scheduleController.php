<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\list_time;
use App\schedule;
use Illuminate\Support\Facades\DB;


class scheduleController extends Controller
{
    public function getTeachingSchedule()
    {
    	$list_time 			= new list_time();
    	$schedule 			= new schedule();
    	$data_studyTime 	= $list_time->getListStudyTime();
    	$data_studyShift 	= $list_time->getListStudyShift();
    	$data_schedule		= $schedule->getDetailSchedule();
    	$data_teacher 		= DB::table('teacher')
    							->get();
    	return view('admin.schedule.teachingSchedule',  [	
    														'data_studyTime' 	=> $data_studyTime,
    														'data_studyShift'	=> $data_studyShift,
    														'data_teacher'		=> $data_teacher,
    														'data_schedule'		=> $data_schedule
    													]);
    }

    public function postAddTeachingSchedule(Request $request)
    {

    	$schedule 			= new schedule();
    	$id_userRegister 	= Auth::user()->id;
    	$teacher			= $schedule->getIdTeacher($request->id_teacher);
    	$studyTime			= $schedule->getIdStudyTime($request->id_studyTime, $request->id_studyShift, $request->id_teacher);
    	$id_teacher 		= !empty($teacher[0]) ? $teacher[0]->id_teacher : null;
    	$id_studyTime 		= !empty($studyTime[0]) ? $studyTime[0]->id_studyTime : null;

    	if(empty($request->id_teacher))
    	{
    		return redirect("admin/schedule/teachingSchedule")->with('loi','Thông tin đăng ký bắt buộc chọn đủ 3 trường: Giảng viên - Thời gian học - Ca học');
    	}
    	elseif (empty($request->id_studyTime)) 
    	{
    		return redirect("admin/schedule/teachingSchedule")->with('loi','Thông tin đăng ký bắt buộc chọn đủ 3 trường: Giảng viên - Thời gian học - Ca học');
    	}
    	elseif (empty($request->id_studyShift)) 
    	{
    		return redirect("admin/schedule/teachingSchedule")->with('loi','Thông tin đăng ký bắt buộc chọn đủ 3 trường: Giảng viên - Thời gian học - Ca học');
    	}
    	elseif (($id_teacher == $request->id_teacher) && ($id_studyTime == $request->id_studyTime)) 
    	{
    		return redirect("admin/schedule/teachingSchedule")->with('loi','Thông tin đăng ký thời gian học đã tồn tại');
    	}
    	else
    	{
    		$teachingSchedule 	= $schedule->insertTeachingSchedule($request->id_teacher, $request->id_studyTime, $request->id_studyShift, $id_userRegister);
    		return redirect("admin/schedule/teachingSchedule")->with('thongbao','Đăng ký thành công'); 
    	}
    }

    public function postDeleteTeachingSchedule(Request $request)
    {
        DB::table('teaching_schedule')->where('id', '=', $request->id)->delete();
        return redirect("admin/schedule/teachingSchedule")->with('thongbao', 'Xóa thời gian học thành công');        

    }
}
