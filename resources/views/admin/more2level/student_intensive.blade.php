@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 Danh sách học viên
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-3" style="margin-top: 10px">
                        <div class="box">
                            <div class="container-1">
                                <a href="#" class="icon"><i class="fa fa-search"></i></a>
                                <input type="text" name="search" id="search" placeholder="Tra cứu thông tin">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9" style="margin-top: 10px;">
                        <div class="col-sm-4" style="margin-left: 41%">
                            <a href="admin/more2level/courseIntensive/1" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Khóa học</a>
                            <a href="admin/more2level/addNewStudents" class="btn btn-success">Thêm mới</a>
                           {{--  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSTModal">Thêm mới</button> --}}
                        </div>
                       {{--  Số buổi học --}}
                        <div class="col-3" style="margin-top: 6px; float: right;">
                            <select class="form-control" id="">
                                <option selected>Chọn buổi học</option>
                                <option value="1">Buổi 1</option>
                                <option value="2">Buổi 2</option>
                                <option value="3">Buổi 3</option>
                            </select>
                        </div>
                        {{--  Số buổi học --}}

{{--                         <div class="modal fade" id="addSTModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header cus-modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel"> Thêm học viên vào khóa học  </h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <form action="admin/more2level/registerStudent" method="POST">
                                        {!! csrf_field() !!}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label for="phone" class="form_text">Chọn học viên</label>
                                                </div>
                                                <div class="col-sm-8">
                                                   <select class="form-control" name="studentId">
                                                      @foreach($exstudents  as $student)
                                                           <option value="{{$student->student_id}}">
                                                                {{$student->student_name}} - MSHV: {{$student->student_id}}
                                                            </option>
                                                       @endforeach
                                                   </select>
                                                </div>
                                            </div>
                                            <input type="hidden" name="courseId" value="{{$courseId}}" >
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-success">OK</button>
                                        </div>
                                        </form>
                                </div>
                            </div>
                        </div> --}}
                    </div>
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
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">STT</th>
                                <th data-breakpoints="xs" class="t_table">Họ và tên học viên</th>
                                <th data-breakpoints="xs" class="t_table">Tham gia</th>
                                <th data-breakpoints="xs" class="t_table">Vắng</th>
                                <th data-breakpoints="xs" class="t_table">Lý do vắng</th>
                                <th data-breakpoints="xs" class="t_table">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $student)
                                <tr data-expanded="true">
                                    <td class="t_table">{{$student->id}}</td>
                                    <td class="t_table">{{$student->student_name}}</td>
                                    <td class="t_table">
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                    <td class="t_table">
                                        <label><input type="checkbox" value=""></label>
                                    </td>
                                    <td class="t_table">
                                        <select class="form-control" id="">
                                            <option selected>Lý do</option>
                                            <option value="1">Bệnh</option>
                                            <option value="2">Công tác</option>
                                            <option value="3">Thi</option>
                                        </select>
                                    </td>
                                    <td class="t_table">
                                        <a href="admin/more2level/deleteStudent/{{$student->id}}/{{$courseId}}" class="btn btn-danger">Xóa </a>
                                        <!-- Modal start -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                  
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection