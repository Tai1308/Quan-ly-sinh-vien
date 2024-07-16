@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                Danh sách giảng viên
                </div>
                <div>
                    {{-- <div class="col-sm-3" style="margin-top: 10px">
                        <div class="box">
                            <div class="container-1">
                                <a href="#" class="icon"><i class="fa fa-search"></i></a>
                                <input type="text" name="search" id="search" placeholder="Tìm kiếm thông tin khóa học ">
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-sm-12" style="margin-top: 10px;">
                        <div style="float: right;">
                            <!-- Modal end -->
                            <a href="admin/more2level/courseIntensive/1" class="btn btn-success"><i class="fa fa-arrow-left" aria-hidden="true"></i> Khóa học</a>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSTModal">Thêm mới</button>
                            <div class="modal fade" id="addSTModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header cus-modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel"> Thêm giảng viên  </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="admin/more2level/registerTeacher" method="POST">
                                            {!! csrf_field() !!}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="phone" class="form_text">Chọn giáo viên   </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                       <select class="form-control" name="teacherId">
                                                          @foreach($exteachers  as $teacher)
                                                               <option value="{{$teacher->teacher_id}}">
                                                                    {{$teacher->teacher_name}} - MSGV: {{$teacher->teacher_id}}
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
                            </div>
                        </div>
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
                                <th data-breakpoints="xs" class="t_table">Tên giảng viên</th>
                                <th data-breakpoints="xs" class="t_table">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $teacher)
                                <tr data-expanded="true">
                                    <td class="t_table">{{$teacher->id}}</td>
                                    <td class="t_table">{{$teacher->teacher_name}}</td>
                                    <td class="t_table">
                                        <a href="admin/more2level/deleteTeacher/{{$teacher->id}}/{{$courseId}}" class="btn btn-danger">Xóa </a>
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