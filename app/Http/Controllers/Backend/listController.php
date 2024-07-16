<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\list_time;
use Illuminate\Validation\ValidationException;

class listController extends Controller
{
    public function getStudyTime()
    {
        $list                = new list_time();
        $data_studyTime    = $list->getListStudyTime();
    
        return view('admin.list.studyTime', ['data_studyTime' => $data_studyTime]);
    }

    public function getStudyShift()
    {
        $list               = new list_time();
        $data_studyShift    = $list->getListStudyShift();
        return view('admin.list.studyShift', ['data_studyShift' => $data_studyShift]);
    }

    public function postAddStudyTime(Request $request)
    {
        $this->validate(
            $request,
            [
                'name_studyTime' => 'required|unique:studytime',
            ],
            [
                'name_studyTime.required' => 'Tên thời gian học không được để trống',
                'name_studyTime.unique' => 'Tên thời gian học đã tồn tại',

            ]
        );

        $list         = new list_time();
        $user_created     = Auth::user()->id;

        $studyTime     = $list->insertStudyTime($request->name_studyTime, $request->detail_studyTime, $user_created);
        return redirect("admin/list/studyTime")->with('thongbao', 'Thêm thông tin thời gian học thành công');
    }

    public function postUpdateStudyTime(Request $request)
    {
        $this->validate(
            $request,
            [
                'name_studyTime' => 'required|unique:studytime',
            ],
            [
                'name_studyTime.required' => 'Tên thời gian học không được để trống',
                'name_studyTime.unique' => 'Tên thời gian học đã tồn tại',

            ]
        );
        $studyTime = list_time::where(['id' => $request->id])
            ->update([
                'name_studyTime' => $request->name_studyTime,
                'detail_studyTime' => $request->detail_studyTime
            ]);
        return redirect('admin/list/studyTime')->with('thongbao', 'Cập nhật thông tin thời gian học thành công');
    }

    public function postDeleteStudyTime(Request $request)
    {
        DB::table('studytime')->where('id', '=', $request->id)->delete();
        return redirect("admin/list/studyTime")->with('thongbao', 'Xóa thời gian học thành công');
    }

    public function postAddStudyShift(Request $request)
    {
        $this->validate(
            $request,
            [
                'name_studyShift' => 'required|unique:studyshift',
            ],
            [
                'name_studyShift.required' => 'Tên ca học không được để trống',
                'name_studyShift.unique' => 'Tên ca học đã tồn tại',
            ]
        );

        $count_studyshift = DB::table('studyshift')->where(['start_time' => $request->start_time, 'end_time' => $request->end_time])->count();
        if ($count_studyshift > 0) {
            throw ValidationException::withMessages(['name_studyShift' => 'Thời gian ca học đã bị trùng']);
        }

        $list       = new list_time();
        $user_created   = Auth::user()->id;
        $name_studyShift    = strtoupper($request->name_studyShift);
        $s_time             = $request->start_time;
        $e_time             = $request->end_time;
        $start_time         = strtotime($s_time);
        $end_time           = strtotime($e_time);
        $time_svalid        = strtotime('06:30:00');
        $time_evalid        = strtotime('21:30:00');
        if ($start_time > $end_time || $start_time < $time_svalid || $end_time > $time_evalid) {
            return redirect("admin/list/studyShift")->with('loi', 'Thời gian bắt đầu hoặc thời gian kết thúc không hợp lệ');
        } else {
            $studyTime  = $list->insertStudyShift($name_studyShift, $s_time, $e_time, $user_created);
            return redirect("admin/list/studyShift")->with('thongbao', 'Thêm thông tin ca học thành công');
        }
    }

    public function postUpdateStudyShift(Request $request)
    {
        $name_studyShift    = strtoupper($request->name_studyShift);
        $s_time             = $request->start_time;
        $e_time             = $request->end_time;
        $start_time         = strtotime($s_time);
        $end_time           = strtotime($e_time);
        $time_svalid        = strtotime('06:30:00');
        $time_evalid        = strtotime('21:30:00');
        if ($start_time > $end_time || $start_time < $time_svalid || $end_time > $time_evalid) {
            return redirect("admin/list/studyShift")->with('loi', 'Thời gian bắt đầu hoặc thời gian kết thúc không hợp lệ');
        } else {
            $data = [
                'name_studyShift'    => $name_studyShift,
                'start_time'   => $s_time,
                'end_time'   => $e_time,
            ];

            DB::table('studyshift')
                ->where('id', '=', $request->id)
                ->update($data);

            return redirect("admin/list/studyShift")->with('thongbao', 'Sửa ca học thành công');
        }
    }

    public function postDeleteStudyShift(Request $request)
    {
        DB::table('studyshift')->where('id', '=', $request->id)->delete();
        return redirect("admin/list/studyShift")->with('thongbao', 'Xóa ca học thành công');
    }
}
