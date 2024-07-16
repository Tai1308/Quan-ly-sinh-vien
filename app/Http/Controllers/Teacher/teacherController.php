<?php

namespace App\Http\Controllers\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;
use App\course;
use Illuminate\Support\Facades\Auth;
class teacherController extends Controller
{
    public function getHomeTeacher()
    {
        return view('teacher.home.homeTeacher');
    }
    public function getUpdateAccount(Request $request)
    {
        $data_user = DB::table('users')
                        ->select('id', 'name', 'email', 'password', 'role')
                        ->where('id', '=', $request->id)
                        ->get();
        return view('teacher.info_teacher.updateAccount', ['data_user' => $data_user]);
        
    }
    public function postUpdateAccount(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'

            ],
            [
                'name.required' => 'Bạn chưa nhập tên tài khoản',
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mật khẩu thay đổi'
            ]);
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'updated_at'=> new DateTime
        ];
        DB::table('users')->where('id', $request->id )->update($data);
        return redirect("teacher/info_teacher/getUpdateAccount/{$request->id}")->with('thongbao','Cập nhật thông tin tài khoản thành công');
        
    }

    public function getIndexHome()
    {
        $id_user = Auth::user()->id;
        $course = new Course();
        $teacher = $course->getTeacher($id_user);
        foreach ($teacher as $key => $value_teacher) 
        {
            $id_teacher = $value_teacher->teacher_id;
        }
        $data_course = $course->getRegisterCourse($id_teacher);
        return view('teacher.layout.indexHome',['data_course'=> $data_course]);
    }
}
