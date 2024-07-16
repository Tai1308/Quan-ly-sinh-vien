@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 KHÓA HỌC INTENSIVE
                </div>
                <div>
                  <table class="table" ui-jq="footable" ui-options='{
                    "paging": {
                      "enabled": true
                    },
                    "filtering": {
                      "enabled": true
                    },
                    "sorting": {
                      "enabled": true
                    }}'>
                    <thead>
                      <tr>
                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên khóa học</th>
                        <th data-breakpoints="xs" class="t_table">Tháng khai giảng</th>
                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Ngày bắt đầu</th>
                        <th class="t_table">Giáo viên giảng dạy</th>
                        <th class="t_table">Số lượng học viên</th>
                        <th data-breakpoints="xs" class="t_table">Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($course as $st)
                        <tr data-expanded="true">
                            <td class="t_table"></td>
                            <td class="t_table"></td>
                            <td class="t_table"></td>
                            <td class="t_table"></td>
                            <td class="t_table"></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateSTModal{{$st->student_id}}">Sửa</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSTModal{{$st->student_id}}">Xóa</button>
                                <!-- Modal start -->
                                <!-- Modal cập nhật thông tin học viên-->
                                <div class="modal fade" id="updateSTModal{{$st->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header cus-modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Cập nhật thông tin</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="admin/humanResources/updateStudent" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">    
                                                <input type="hidden" name="id" value="{{$st->student_id}}">
                                                <div class="modal-body">    
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="updateName" class="form_text">Tên học viên: </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="{{$st->student_name}}" name="student_name" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="phone" class="form_text">Số điện thoại: </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="inputPhoneStudent" value="{{$st->phone}}" name="phone" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="gmailStudent" class="form_text">Gmail: </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" id="inputGmailStudent" value="{{$st->email}}" name="email" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="target" class="form_text">Mục tiêu:</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="inputTargetStudent" value="{{$st->target_point}}" name="target_point" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label for="updateAddress" class="form_text">Địa chỉ:</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" value="{{$st->address}}" name="address" required="">
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
                                <div class="modal fade" id="deleteSTModal{{$st->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header cus-modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Xóa học viên</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="admin/humanResources/deleteStudent" method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">    
                                                <input type="hidden" name="id" value="{{$st->student_id}}">
                                                <div class="modal-body">    
                                                    <p>Bạn muốn xóa học viên <b>{{$st->student_name}}</b>?</p>
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
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
            <div style="margin-left: 85%">
                {!!$student->links()!!}
            </div>
            <div style="margin-left: 73%; margin-top: 10px;">
                <a href="{{route('exportStudent.exportExcelStudent')}}"><button type="button" class="btn btn-success">Export</button></a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adsdSTModal">Thêm mới</button>
                <!-- Modal start -->
                <!-- Modal cập nhật thông tin học viên-->
                <div class="modal fade" id="addSTModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header cus-modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Thêm học viên</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="admin/humanResources/addStudent" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="phone" class="form_text">Họ và tên học viên: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="addNameStudent" name="student_name" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="idStudent" class="form_text">CMND: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="addIdStudent" name="student_id" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="sex" class="form_text">Giới tính: </label>
                                        </div>
                                        <div class="col-sm-8">
                                                <select class="form-control" id="exampleFormControlSelect1" name="sex">
                                                    <option value="">Chọn giới tính</option>
                                                    <option value="1">Nam</option>
                                                    <option value="0">Nữ</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="phone" class="form_text">Số điện thoại: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="addPhoneStudent" name="phone" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="addressStudent" class="form_text">Địa chỉ: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="addAddressStudent" name="address" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="Email" class="form_text">Email: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" id="addEmailStudent" name="email" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="target" class="form_text">Mục tiêu: </label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="addTarget" name="target_point" required="">
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
                <!-- Modal end -->
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger error_Acc" style="margin-top: 20px">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-top: 20px">
                    {{session('thongbao')}}
                </div>
            @endif
        </div>
    </section>
</section>
<!--main content end-->
@endsection