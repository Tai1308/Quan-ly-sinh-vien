<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student_test;
use DB;
use DateTime;
use App\user;
use Carbon\Carbon;
use App\student;

class studentController extends Controller
{
    public function getHomeStudent()
    {
        $id_user       = Auth::user()->id;
        $student_test  = new student_test();
        $data_course   = $student_test->getListCourse($id_user);
        $id_student    = $student_test->getIdStudent($id_user);

        return view('student.home.homeStudent', [
            'data_course' => $data_course,
            'id_student'  => $id_student
        ]);
    }
    public function getPageDocument()
    {
        $id_user        = Auth::user()->id;
        $student_test   = new student_test();
        $data_course    = $student_test->getListCourse($id_user);
        $data_document  = $student_test->getListDocument($id_user);
        return view('student.practice_document.document', [
            'data_course'   => $data_course,
            'data_document' => $data_document
        ]);
    }

    public function getDocument(Request $request)
    {
        $id_user                = Auth::user()->id;
        $student_test           = new student_test();
        $data_course            = $student_test->getListCourse($id_user);
        $data_documentCourse    = $student_test->getListDocumentCourse($request->id);

        return view('student.practice_document.documentOfCourse',   [
            'data_course'           => $data_course,
            'data_documentCourse'   => $data_documentCourse
        ]);
    }
    public function getUpdateAccount(Request $request)
    {
        $id_user       = Auth::user()->id;
        $student_test  = new student_test();
        $data_course   = $student_test->getListCourse($id_user);
        $userAccount = new user;
        $data_user = DB::table('users')
            ->select('id', 'name', 'email', 'password', 'role')
            ->where('id', '=', $request->id)
            ->get();

        return view('student.info_student.updateAccountStudent', [
            'data_course'       => $data_course,
            'data_user' => $data_user
        ]);
    }

    public function postUpdateAccount(Request $request)
    {
        $userAccount = new user;
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required'

            ],
            [
                'name.required' => 'Bạn chưa nhập tên tài khoản',
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mật khẩu thay đổi'
            ]
        );
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'updated_at' => new DateTime
        ];
        DB::table('users')->where('id', $request->id)->update($data);
        return redirect("student/account/getUpdateAccount/{$request->id}")->with('thongbao', 'Cập nhật thông tin tài khoản thành công');
    }

    public function getScoreStudent()
    {
        $user       = Auth::user();
        $student = student::where('id_user', $user->id)->first();
        if (!$student) {
            return redirect()->back();
        }

        $student_id = $student->student_id;

        $histories =   DB::table('history')
            ->join('student', 'student.student_id', '=', 'history.id_student')
            ->join('course_detail', 'course_detail.id', '=', 'history.courseId')
            ->select('history.*', 'student.student_name as student_name','course_detail.name as course_name')
            ->where('history.id_student', $student_id)
            ->get();

        return view('student.history.index', ['histories' => $histories]);
    }

    public function getCourseStudent()
    {
        $user       = Auth::user();
        $student = student::where('id_user', $user->id)->first();
        if (!$student) {
            return redirect()->back();
        }

        $student_id = $student->student_id;

        $courses =   DB::table('register_course_student')
            ->join('student', 'student.student_id', '=', 'register_course_student.studentId')
            ->join('course_detail', 'course_detail.id', '=', 'register_course_student.courseId')
            ->join('studyshift', 'studyshift.id', '=', 'course_detail.id_studyShift')
            ->join('studytime', 'studytime.id', '=', 'course_detail.id_studyTime')
            ->select('register_course_student.*', 'student.student_name as student_name',
                'course_detail.name as course_name', 'studyshift.name_studyShift as name_studyShift', 'studytime.name_studyTime', 'course_detail.startDate', 'course_detail.endDate')
            ->where('register_course_student.studentId', $student_id)
            ->get();

        return view('student.course.index', ['courses' => $courses]);
    }
}
