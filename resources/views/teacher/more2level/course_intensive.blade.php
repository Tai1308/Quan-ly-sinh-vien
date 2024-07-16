@extends('teacher.layout.index_teacher')
@section('content')


<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            @if(count($errors) > 0)
                <div class="alert alert-danger" style="margin-top: 20px">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger" style="margin-top: 20px">
                    {{session('loi')}}
                </div>  
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-top: 20px">
                    {{session('thongbao')}}
                </div>  
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                 DANH SÁCH LỚP CỦA KHÓA HỌC
                </div>
                <div>
                    <!-- {{-- <div class="col-sm-3" style="margin-top: 10px">
                        <div class="box">
                            <div class="container-1">
                                <a href="#" class="icon"><i class="fa fa-search"></i></a>
                                <input type="text" name="search" id="search" placeholder="Tìm kiếm thông tin khóa học ">
                            </div>
                        </div>
                    </div> --}} -->
                   {{--  <div class="col-sm-12" style="margin-top: 10px;">
                        <div style="float: right;">
                            <!-- Modal end -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSTModal">Thêm mới</button>
                            <div class="modal fade" id="addSTModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header cus-modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Thêm mới khóa học </h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <form action="teacher/more2level/addIntensive" method="POST">
                                            {!! csrf_field() !!}
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="phone" class="form_text">Tên lớp học  </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="name" name="name" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="idStudent" class="form_text">Ngày Bắt đầu </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="startDate" name="startDate" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="endDate" class="form_text">Ngày kết thúc  </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="date" class="form-control" id="endDate" name="endDate" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="studyTime" class="form_text">Thời gian học </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="studyTime">
                                                            <option selected="" >---</option>
                                                            @foreach($studyTime as $st)
                                                                <option value="{{$st->id}}">{{$st->name_studyTime}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="studyShift" class="form_text">Ca học </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" name="studyShift">
                                                            <option selected="" >---</option>
                                                            @foreach($studyShift as $ss)
                                                                <option value="{{$ss->id}}">{{$ss->name_studyShift}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="category_id" value="{{$category_id}}" >
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
                    </div> --}}
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
                                <th data-breakpoints="xs" class="t_table">Tên khóa học</th>
                                <th class="t_table">Thời gian dự kiến</th>
                                {{-- <th data-breakpoints="xs" class="t_table">Hành động</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                                <tr data-expanded="true">
                                    <td class="t_table">{{$course->id}}</td>
                                    <td class="t_table">
                                        <a href="teacher/more2level/infoCourse/{{$course->id}}">{{$course->name}}</a>
                                    </td>
                                    <td class="t_table">{{$course->startDate}} - {{$course->endDate}}</td>
                                    {{-- <td class="t_table">
                                        <a href="teacher/more2level/deleteIntensive/{{$course->id}}/{{$category_id}}" class="btn btn-danger">Xóa</a>
                                        <!-- Modal start -->
                                    </td> --}}
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