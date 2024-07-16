<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users;

class userController extends Controller
{
    //
    public function getDangNhapAdmin()
    {
    	return view('admin.login');
    }

    public function getDangky()
    {
        return view('admin.signin');
    }

    public function getTest()
    {
        return view('student.test');
    }

    public function postDangNhapAdmin(Request $request)
    {
    	$this->validate($request,
    		[
    			'email' => 'required',
    			'password' => "required|min:2|max:32",
    		],
    		[
    			'email.required' => 'Email đăng nhập không được để trống',
    			'password.required' => 'Password không được để trống',
    			'password.min' => 'Password phải chứa ít nhất 3 ký tự',
    			'password.max' => 'Password không được quá 32 ký tự',
    		]);
        
        $data = $request->only('email', 'password');
        
        if (Auth::attempt($data)) {

            $role = Auth::user()->role;
            if($role == 1)
            {
                return redirect('admin/trangchu/indexHome');
            }
            elseif ($role == 2) {
                return redirect('teacher/homeTeacher/indexHome');
            }
            elseif ($role == 3) {
                return redirect('student/homeStudent/homeStudent');
            }
        }
        else{
            return redirect()->route('admin.login')->with('thongbao', 'Sai email hoặc mật khẩu vui lòng kiểm tra lại');
        } 
    }
    public function postDangXuatAdmin()
    {
        Auth::logout();
        return redirect('/');
    }
}
