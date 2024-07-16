<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use App\course;
use App\student;
use App\teacher;
use App\CourseDetail;
use App\student_test;
use DB;
use Excel;
use DateTime;
use Illuminate\Support\Facades\Auth;
class humanResourcesController extends Controller
{
    //=======================Tài khoản=======================
    public function getAccount()
    {
        $user = user::paginate(10);
    	return view('admin.humanResources.account',['user' => $user]);
    }
    public function postAddAccount(Request $request)
    {

    	$this->validate($request,
    		[
    			'name' => 'required|min:3|max:100'
    		],
    		[
    			'name.required' => 'Bạn chưa nhập tên tài khoản',
    			'name.min' => 'Tên tài khoản phải chứa ít nhất 3 ký tự',
    			'name.max' => 'Tên tài khoản không được quá 100 ký tự',
    		]);
    	$userAccount = new user;
    	$userAccount->name = $request->name;
    	$userAccount->email = $request->email;
        $userAccount->role = $request->role;
    	$userAccount->password = bcrypt($request->password);
    	$userAccount->save();
    	return redirect('admin/humanResources/account')->with('thongbao','Thêm thành công');
    }
    public function postDeleteAccount (Request $request)
    { 
        $user = user::where(['id' => $request->id])
            ->delete();
        return redirect('admin/humanResources/account')->with('thongbao','Xóa thông tin tài khoản thành công');
    }

    public function getUpdateAccount(Request $request)
    {
        $userAccount = new user;
        $data_user = DB::table('users')
                        ->select('id', 'name', 'email', 'password', 'role')
                        ->where('id', '=', $request->id)
                        ->get();
        return view('admin.humanResources.updateAccount', ['data_user' => $data_user]);
        
    }

    public function getUpdateAccountAdmin(Request $request)
    {
        $data_user = DB::table('users')
                        ->select('id', 'name', 'email', 'password', 'role')
                        ->where('id', '=', $request->id)
                        ->get();
        return view('admin.humanResources.updateAccountAdmin',['data_user' => $data_user]); 
    }

    public function postUpdateAccount(Request $request)
    {
        $userAccount = new user;
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
        return redirect("admin/humanResources/getUpdateAccount/{$request->id}")->with('thongbao','Cập nhật thông tin tài khoản thành công');
        
    }

    public function postUpdateAccountAdmin(Request $request)
    {
        $userAccount = new user;
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
            'role'      => $request->role,
            'updated_at'=> new DateTime
        ];
        DB::table('users')->where('id', $request->id )->update($data);
        return redirect("admin/humanResources/getUpdateAccountAdmin/{$request->id}")->with('thongbao','Cập nhật thông tin tài khoản người dùng thành công');
        
    }
    //=======================Học viên =======================
    public function getStudent()
    {
        $student = student::paginate(10);
    	return view('admin.humanResources.student',['student' => $student]);
    }
    public function postAddStudent(Request $request)
    {
    	$this->validate($request,
    		[
    			'student_name' => 'required|min:3|max:100',
    			'student_id' => 'required|unique:student',
    			'sex' => 'required|',
    			'phone' => 'required|max:10',
    			'address' => 'required|max:200',
    			'email' => 'required|unique:student,email|unique:users,email',
    			'target_point' => 'required',
    		],
    		[
    			'student_name.required' => 'Họ và tên không được để trống',
    			'student_name.min' => 'Tên học viên phải chứa ít nhất 3 ký tự',
    			'student_name.max' => 'Tên học viên không được quá 100 ký tự',
    			'student_id.required' => 'CMND không được để trống',
                'student_id.unique' => 'CMND phải là số duy nhất',
    			'sex.required' => 'Giới tính không được để trống',
    			'phone.required' => 'Số điện thoại không được để trống',
    			'phone.max' => 'Số điện thoại không hợp lệ',
    			'address.required' => 'Địa chỉ không được để trống',
    			'address.max' => 'Địa chỉ không hợp lệ',
    			'email.required' => 'Email không được để trống',
                'email.unique' => 'Email là tài khoản email duy nhất. Email vừa nhập là tài khoản đã tồn tại',
    			'target_point.required' => 'Mục tiêu không được để trống',
    		]);
        $user               = new user;
        $data_user          = $user->insertUser($request->student_name, $request->email);
    	$student               = new student;
    	$student->student_name = $request->student_name;
    	$student->student_id    = substr(time(), 4);
        $student->student_card   = $request->student_id;
    	$student->email        = $request->email;
    	$student->address      = $request->address;
    	$student->sex          = $request->sex;
    	$student->phone        = $request->phone;
    	$student->target_point = $request->target_point;
        $student->id_user      = $data_user;
    	$student->save();
    	return redirect('admin/humanResources/student')->with('thongbao','Thêm học viên thành công');
    }
    public function postUpdateStudent (Request $request)
    { 
        $this->validate($request,
            [
                'student_name' => 'required|min:3|max:100',
                'phone' => 'required|max:10',
                'address' => 'required|max:200',
                'email' => 'required',
                'target_point' => 'required',
            ],
            [
                'student_name.required' => 'Họ và tên không được để trống',
                'student_name.min' => 'Tên học viên phải chứa ít nhất 3 ký tự',
                'student_name.max' => 'Tên học viên không được quá 100 ký tự',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.max' => 'Số điện thoại không hợp lệ',
                'address.required' => 'Địa chỉ không được để trống',
                'address.max' => 'Địa chỉ không hợp lệ',
                'email.required' => 'Email không được để trống',
                'target_point.required' => 'Mục tiêu không được để trống',
            ]);

        $student = student::where(['student_id' => $request->id])
            ->update([
                'student_name' => $request->student_name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'target_point' => $request->target_point
            ]);
      
        return redirect('admin/humanResources/student')->with('thongbao','Cập nhật thông tin học viên thành công');
    }


    public function postDeleteStudent (Request $request)
    { 
        $student = student::where(['student_id' => $request->id])
            ->delete();
        return redirect('admin/humanResources/student')->with('thongbao','Xóa thông tin học viên thành công');
    }

    public function exportExcelStudent()
    {
        $student_data = DB::table('student')->get()->toArray();
        $student_array[] = array('Họ và tên học viên', 'Chứng minh nhân dân', 'Mục tiêu', 'Điện thoại', 'Email', 'Địa chỉ');
        foreach ($student_data as $student) 
        {
            $student_array[] = array(
                'Họ và tên học viên'     => $student->student_name,
                'Chứng minh nhân dân'              => $student->student_id,
                'Mục tiêu'          => $student->target_point,
                'Điện thoại'   => $student->phone,
                'Email'   => $student->email,
                'Địa chỉ'   => $student->address
            );
        }
        Excel::create('DanhSach_HocVien', function($excel) use($student_array){
            $excel->setTitle('DanhSach_HocVien');
            $excel->sheet('DanhSach_HocVien', function($sheet) use($student_array){
                $sheet->fromArray($student_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
    public function getImportStudent()
    {
        return view('admin.humanResources.importStudent');
    }
    
    // =======================Giáo viên=======================
    public function getTeacher()
    {
        $teacher = teacher::paginate(10);
    	return view('admin.humanResources.teacher',['teacher' => $teacher]);
    }
    public function postAddTeacher(Request $request)
    {
    	$this->validate($request,
    		[
    			'teacher_name' => 'required|min:3|max:100',
    			'teacher_id' => 'required',
    			'sex' => 'required|',
    			'phone' => 'required|max:10',
    			'address' => 'required|max:200',
    			'gmail' => 'required',
    			'certificate' => 'required',
    		],
    		[
    			'teacher_name.required' => 'Họ và tên không được để trống',
    			'teacher_name.min' => 'Tên học viên phải chứa ít nhất 3 ký tự',
    			'teacher_name.max' => 'Tên học viên không được quá 100 ký tự',
    			'teacher_id.required' => 'CMND không được để trống',
    			'sex.required' => 'Giới tính không được để trống',
    			'phone.required' => 'Số điện thoại không được để trống',
    			'phone.max' => 'Số điện thoại không hợp lệ',
    			'address.required' => 'Địa chỉ không được để trống',
    			'address.max' => 'Địa chỉ không hợp lệ',
    			'gmail.required' => 'Email không được để trống',
    			'certificate.required' => 'Chứng chỉ giảng viên không được để trống',
    		]);
        $user               = new user;
        $data_user          = $user->insertUserTeacher($request->teacher_name, $request->gmail);
    	$teacher = new teacher;
    	$teacher->teacher_name = $request->teacher_name;
    	$teacher->teacher_id =  substr(time(), 4);
        $teacher->teacher_card = $request->teacher_id;
    	$teacher->gmail = $request->gmail;
    	$teacher->address = $request->address;
    	$teacher->sex = $request->sex;
    	$teacher->phone = $request->phone;
    	$teacher->certificate = $request->certificate;
        $teacher->id_user = $data_user;
    	$teacher->save();
    	return redirect('admin/humanResources/teacher')->with('thongbao','Thêm giáo viên thành công');
    }

    public function postUpdateTeacher (Request $request)
    { 
        $this->validate($request,
            [
                'teacher_name' => 'required|min:3|max:100',
                'phone' => 'required|max:10',
                'address' => 'required|max:200',
                'gmail' => 'required',
                'certificate' => 'required',
            ],
            [
                'teacher_name.required' => 'Họ và tên không được để trống',
                'teacher_name.min' => 'Tên giáo viên phải chứa ít nhất 3 ký tự',
                'teacher_name.max' => 'Tên giáo viên không được quá 100 ký tự',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.max' => 'Số điện thoại không hợp lệ',
                'address.required' => 'Địa chỉ không được để trống',
                'address.max' => 'Địa chỉ không hợp lệ',
                'gmail.required' => 'Email không được để trống',
                'certificate.required' => 'Mục tiêu không được để trống',
            ]);

        $teacher = teacher::where(['teacher_id' => $request->id])
            ->update([
                'teacher_name' => $request->teacher_name,
                'gmail' => $request->gmail,
                'address' => $request->address,
                'phone' => $request->phone,
                'certificate' => $request->certificate
            ]);
        return redirect('admin/humanResources/teacher')->with('thongbao','Cập nhật thông tin giáo viên thành công');
    }

    public function postDeleteTeacher (Request $request)
    { 
        $teacher = teacher::where(['teacher_id' => $request->id])
            ->delete();
        return redirect('admin/humanResources/teacher')->with('thongbao','Xóa thông tin giáo viên thành công');
    }

    public function exportExcelTeacher()
    {
        $teacher_data = DB::table('teacher')->get()->toArray();

        $teacher_array[] = array('Họ và tên giáo viên', 'Chứng minh nhân dân', 'Chứng chỉ', 'Điện thoại', 'Email', 'Địa chỉ');
        foreach ($teacher_data as $teacher) 
        {
            $teacher_array[] = array(
                'Họ và tên giáo viên'     => $teacher->teacher_name,
                'Chứng minh nhân dân'              => $teacher->teacher_id,
                'Chứng chỉ'          => $teacher->certificate,
                'Điện thoại'   => $teacher->phone,
                'Email'   => $teacher->gmail,
                'Địa chỉ'   => $teacher->address
            );
        }
        Excel::create('DanhSach_GiaoVien', function($excel) use($teacher_array){
            $excel->setTitle('DanhSach_GiaoVien');
            $excel->sheet('DanhSach_GiaoVien', function($sheet) use($teacher_array){
                $sheet->fromArray($teacher_array, null, 'A1', false, false);
            });
        })->download('xlsx');
    }

    // ======================================Trang chủ===============================================
    public function getTrangchu()
    {
        return view('admin.home.home');
    }
    public function getIndex()
    {
        return view('admin.layout.indexHome');
    }
    public function index()
    {
        
        return view('admin.layout.index');
    }

    public function getListTrainee()
    {
        $student_test   = new student_test();
        $getTrainee     = $student_test->getTrainee();
        $getCourse = $student_test->getCourse();
        return view('admin.humanResources.listTrainee', [
                                                            'getTrainee' => $getTrainee,
                                                            'getCourse' => $getCourse
                                                        ]);
    }

    public function addTrainee(Request $request)
    {
        $student_test   = new student_test();
        $user               = new user;
        $student               = new student;
        $data_user          = $user->insertUser($request->student_name, $request->email);
        $student->student_name = $request->student_name;
        $student->student_id   = $request->student_id;
        $student->email        = $request->email;
        $student->address      = $request->address;
        $student->sex          = $request->sex;
        $student->phone        = $request->phone;
        $student->target_point = $request->target_point;
        $student->id_user      = $data_user;
        $student->save();
        $register_trainee = $student_test->registerTrainee($request->student_id, $request->course);
        return redirect('admin/trainee/getListTrainee')->with('thongbao','Thêm thành công');
    }

    public function courseStudent($id)
    {
        $student = student::where('student_id', $id)->first();
        $courseIds = \DB::table('register_course_student')->where('studentId', $id)->pluck('courseId')->toArray();
        $courses = CourseDetail::with('category')->whereIn('id', $courseIds)->paginate(10);

        $viewData = [
            'courses' => $courses,
            'student' => $student,
        ];
        return view('admin.humanResources.course_student', $viewData);
    }


    public function courseTeacher($id)
    {
        $teacher = teacher::where('teacher_id', $id)->first();
        $courseIds = \DB::table('register_course_teacher')->where('teacherId', $id)->pluck('courseId')->toArray();
        $courses = CourseDetail::with('category')->whereIn('id', $courseIds)->paginate(10);

        $viewData = [
            'courses' => $courses,
            'teacher' => $teacher,
        ];
        return view('admin.humanResources.course_teacher', $viewData);
    }

}
