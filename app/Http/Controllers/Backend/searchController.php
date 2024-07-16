<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\student;
use App\teacher;
use DB;

class searchController extends Controller
{
        //Tìm kiếm học viên
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('student')
                                ->where('student_name', 'like', '%'.$query.'%')
                
                                ->orWhere('phone', 'like', '%'.$query.'%')
                                ->orWhere('email', 'like', '%'.$query.'%')
                        
                                ->orWhere('student_id', 'like', '%'.$query.'%')
                                ->orderBy('student_id','desc')
                                ->get();
            }
            else
            {
                $data = DB::table('student')
                                ->orderBy('student_id','desc')
                                ->get();
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach ($data as $key => $st) 
                {
                    $output .= '
                    <tr data-expanded="true">
                        <td class="t_table">'.$st->student_id.'</td>
                        <td class="t_table">'.$st->student_name.'</td>
                        <td class="t_table">'.$st->phone.'</td>
                        <td class="t_table">'.$st->email.'</td>
                        <td class="t_table">'.$st->target_point.'</td>
                        <td class="t_table">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateSTModal'.$st->student_id.'">Sửa</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSTModal'.$st->student_id.'">Xóa</button>
                            <a href="'.route("course.student", $st->student_id).'" class="btn btn-primary">Chi tiết</a>
                            <!-- Modal start -->
                            <!-- Modal cập nhật thông tin học viên-->
                            <div class="modal fade" id="updateSTModal'.$st->student_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header cus-modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="admin/humanResources/updateStudent" method="POST">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">    
                                            <input type="hidden" name="id" value="'.$st->student_id.'">
                                            <div class="modal-body">    
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="updateName" class="form_text">Tên học viên: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="'.$st->student_name.'" name="student_name" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="phone" class="form_text">Số điện thoại: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="inputPhoneStudent" value="'.$st->phone.'" name="phone" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="gmailStudent" class="form_text">Gmail: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="email" class="form-control" id="inputGmailStudent" value="'.$st->email.'" name="email" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="target" class="form_text">Mục tiêu:</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="inputTargetStudent" value="'.$st->target_point.'" name="target_point" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="updateAddress" class="form_text">Địa chỉ:</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" value="'.$st->address.'" name="address" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-success">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal xóa học viên-->
                            <div class="modal fade" id="deleteSTModal'.$st->student_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header cus-modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Xóa học viên</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="admin/humanResources/deleteStudent" method="POST">
                                            <input type="hidden" name="_token" value="'.csrf_token().'">    
                                            <input type="hidden" name="id" value="'.$st->student_id.'">
                                            <div class="modal-body">    
                                                <p>Bạn muốn xóa học viên <b>'.$st->student_name.'</b>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-success">OK</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal end -->
                        
                        </td>
                    </tr>
                    ';
                }
            }
            else
            {
                $output = '
                    <tr>
                        <td align="center" colpan="5">Không tìm thấy dữ liệu tìm kiếm</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data' => $output
            );
            echo json_encode($data);
        }
    }

    //Tìm kiếm giảng viên
    function searchTeacher (Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('teacher')
                                ->where('teacher_name', 'like', '%'.$query.'%')
                                ->orWhere('certificate', 'like', '%'.$query.'%')
                                ->orWhere('phone', 'like', '%'.$query.'%')
                                ->orWhere('gmail', 'like', '%'.$query.'%')
                                ->orWhere('address', 'like', '%'.$query.'%')
                                ->orWhere('teacher_id', 'like', '%'.$query.'%')
                                ->orderBy('teacher_id','desc')
                                ->get();
            }
            else
            {
                $data = DB::table('teacher')
                                ->orderBy('teacher_id','desc')
                                ->get();
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach ($data as $tc) 
                {
                    $output .= '
						<tr data-expanded="true">
                            <td class="t_table">'.$tc->teacher_id.'</td>
                            <td class="t_table">'.$tc->teacher_name.'</td>
                            <td class="t_table">'.$tc->phone.'</td>
                            <td class="t_table">'.$tc->gmail.'</td>
                            <td class="t_table">'.$tc->certificate.'</td>
                            <td class="t_table">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateTCModal'.$tc->teacher_id.'">Sửa</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTCModal'.$tc->teacher_id.'">Xóa</button>
                                <a href="'.route("course.teacher", $tc->teacher_id).'" class="btn btn-primary">Chi tiết</a>
                                <!-- Modal start -->
                                <!-- Modal cập nhật thông tin học viên-->
                                <div class="modal fade" id="updateTCModal'.$tc->teacher_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header cus-modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Cập nhật thông tin giảng viên</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="admin/humanResources/updateTeacher" method="POST">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">    
                                                <input type="hidden" name="id" value="'.$tc->teacher_id.'">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="nameTeacher" class="form_text">Họ và tên giáo viên: </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="teacher_name" value="'.$tc->teacher_name.'" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="phone" class="form_text">Số điện thoại: </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="phone" value="'.$tc->phone.'" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="gmail" class="form_text">Gmail: </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" name="gmail" value="'.$tc->gmail.'" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="certificate" class="form_text">Chứng chỉ:</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="certificate" value="'.$tc->certificate.'" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="target" class="form_text">Địa chỉ:</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="address" value="'.$tc->address.'" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-success">OK</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal xóa học viên-->
                                <div class="modal fade" id="deleteTCModal'.$tc->teacher_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header cus-modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Xóa giảng viên</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="admin/humanResources/deleteTeacher" method="POST">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">    
                                                <input type="hidden" name="id" value="'.$tc->teacher_id.'">
                                                <div class="modal-body">    
                                                    <p>Bạn muốn xóa giáo viên <b>'.$tc->teacher_name.'</b>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-success">OK</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </td>
                        </tr>
                    ';
                }
            }
            else
            {
                $output = '
                    <tr>
                        <td align="center" colpan="5">Không tìm thấy dữ liệu tìm kiếm</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data' => $output
            );
            echo json_encode($data);
        }
    }
        //Tìm kiếm tài khoản
    function searchAccount (Request $request)
    {
        if($request->ajax())
        {
            $role = [
                1 => 'Quản trị',
                2 => 'Giáo viên',
                3 => 'Học viên',
            ];
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('users')
                                ->where('name', 'like', '%'.$query.'%')
                                ->orWhere('id', $query)
                                ->orWhere('email', 'like', '%'.$query.'%')
                                ->orderBy('id','desc')  
                                ->get();
            }
            else
            {
                $data = DB::table('users')
                                ->orderBy('id','desc')
                                ->get();
            }

            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach ($data as $key => $acc) 
                {
                    $stt = $key + 1;
                    $output .= '
					    <tr data-expanded="true">
                            <td class="t_table">'.$acc->id.'</td>
                            <td class="t_table">'.$acc->name.'</td>
                            <td class="t_table">'.$acc->email.'</td>
                            <td class="t_table">'.$role[$acc->role].'</td>
                            <td >
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAccModal'.$acc->id.'">Xóa</button>
                                <a href="admin/humanResources/getUpdateAccountAdmin/'.$acc->id.'"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#deleteAccModal">Sửa</button></a>
                                
                                <!-- Modal start -->
                                <!-- Modal xóa tài khoản-->
                                <div class="modal fade" id="deleteAccModal'.$acc->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header cus-modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Xóa tài khoản người dùng</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="admin/humanResources/deleteAccount" method="POST">
                                                <input type="hidden" name="_token" value="'.csrf_token().'">    
                                                <input type="hidden" name="id" value="'.$acc->id.'">
                                                <div class="modal-body">    
                                                    <p>Bạn muốn xóa tài khoản <b>'.$acc->name.'</b>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-success">OK</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal end -->
                            </td>
                        </tr>
                    ';
                }
            }
            else
            {
                $output = '
                    <tr>
                        <td align="center" colpan="5">Không tìm thấy dữ liệu tìm kiếm</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data' => $output
            );
            echo json_encode($data);
        }
    }  
}
