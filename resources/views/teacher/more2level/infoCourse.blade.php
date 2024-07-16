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
			<div class="container">
			    <div class="row">
			        <div class="col-md-11">
			            <div class="tab" role="tabpanel">
			                <!-- Nav tabs -->
			                <ul class="nav nav-tabs" role="tablist">
			                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="tab_focus">Thông tin lớp học</a></li>
			                    <li role="presentation" ><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab" class="tab_focus">Giảng viên</a></li>
			                    <li role="presentation" ><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab" class="tab_focus">Lịch học</a></li> 
			                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab" class="tab_focus">Học viên</a></li>
			                    <li role="presentation"><a href="#Section6" aria-controls="messages" role="tab" data-toggle="tab" class="tab_focus">Tài liệu</a></li>
			                    <li role="presentation"><a href="#Section8" aria-controls="messages" role="tab" data-toggle="tab" class="tab_focus">Quản lý điểm</a></li>
			                </ul>
			                <!-- Tab panes -->
			                <div class="tab-content">
			                	{{-- Thông tin lớp học --}}
			                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
			                        <div class="panel-body">
					                    <div class="form">
					                        <form class="cmxform form-horizontal " id="signupForm" method="" action="" novalidate="novalidate">
					                        	@foreach($courses as $course)
						                            <input class=" form-control" id="id" name="id" type="hidden" value="" disabled="disabled">
						                            <div class="form-group ">
						                                <label for="firstname" class="control-label col-lg-3">Mã lớp</label>
						                                <div class="col-lg-8">
						                                    <input class=" form-control" id="course_id" name="course_id" type="text" value="{{$course->id}}" disabled="disabled">
						                                </div>
						                            </div>
						                            <div class="form-group ">
						                                <label for="lastname" class="control-label col-lg-3">Tên khóa học</label>
						                                <div class="col-lg-8">
						                                    <input class=" form-control" id="course_name" name="course_name" type="text" value="{{$course->name}}">
						                                </div>
						                            </div>
						                            <div class="form-group ">
						                                <label for="username" class="control-label col-lg-3">Ngày bắt đầu</label>
						                                <div class="col-lg-8">
						                                    <input class="form-control " id="start_date" name="start_date" type="date" value="{{$course->startDate}}">
						                                </div>
						                            </div>
						                            <div class="form-group ">
						                                <label for="username" class="control-label col-lg-3">Ngày kết thúc</label>
						                                <div class="col-lg-8">
						                                    <input class="form-control " id="end_date" name="end_date" type="date" value="{{$course->endDate}}">
						                                </div>
						                            </div>
						                            @foreach($data_study as $ds)
						                            <div class="form-group ">
						                                <label for="studyTime" class="control-label col-lg-3">Thời gian học</label>
						                                <div class="col-lg-8">
						                                    <input class="form-control " id="studyTime" name="studyTime" type="text" value="{{$ds->name_studyTime}}">
						                                </div>
						                            </div>
						                            <div class="form-group ">
						                                <label for="studyShift" class="control-label col-lg-3">Ca học</label>
						                                <div class="col-lg-8">
						                                    <input class="form-control " id="studyShift" name="studyShift" type="text" value="{{$ds->name_studyShift}} ({{$ds->start_time}} - {{$ds->end_time}})">
						                                </div>
						                            </div>
						                            @endforeach
						                            <div class="form-group ">
						                                <label for="username" class="control-label col-lg-3">Số lượng học viên</label>
						                                <div class="col-lg-8">
						                                    <input class="form-control " id="quantity_student" name="quantity_student" type="text" value="{{$count_student}}">
						                                </div>
						                            </div>
					                            @endforeach
					                        </form>
					                    </div>
					                </div>
			                    </div>
			                    {{-- Danh sách học viên --}}
			                    <div role="tabpanel" class="tab-pane fade" id="Section2">
			                        <div class="panel panel-default">
						                <div class="col-sm-12">
						                    <div class="col-sm-3" style="margin-top: 10px">
						                        
						                    </div>
						                    <div class="col-sm-9" style="margin-top: 10px;">
						                        <div class="col-sm-1" style="margin-left: 41%">
						                        	{{-- @foreach($courses as $course)
						                            <a href="teacher/more2level/addNewStudents/{{$course->id}}" class="btn btn-success" style="margin-left: 50%; margin-top: 6px">Ghi danh</a>
						                           	@endforeach --}}
						                        </div>
						                       {{--  Số buổi học --}}
						                        <div class="col-5" style="margin-top: 6px; float: right;">
						                            <select class="form-control" id="buoihocSelect">
						                            	<option selected="">Chọn buổi học</option>
						                            	@foreach($periods as $period)
						                                	<option value="{{$period->id}}">Buổi {{$period->period}} - {{$period->skill}} ({{$period->start_time}}-{{$period->end_time}})
						                                	</option>
						                                @endforeach
						                            </select>
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
						                                <th data-breakpoints="xs" class="t_table">Họ và tên học viên</th>
						                                <th data-breakpoints="xs" class="t_table">Tham gia</th>
						                                <th data-breakpoints="xs" class="t_table">Vắng</th>
						                                <th data-breakpoints="xs" class="t_table">Lý do vắng</th>
						                                <th data-breakpoints="xs" class="t_table">Hành động</th>
						                            </tr>
						                        </thead>
						                        <tbody id="tableBody">
						                           	@foreach($students as $student)
						                                <tr data-expanded="true">
						                                    <td class="t_table">{{$student->student_name}}</td>
						                                    <td class="t_table">
						                                        {{-- <label><input type="checkbox" value=""></label> --}}
						                                    </td>
						                                    <td class="t_table">
						                                        {{-- <label><input type="checkbox" value=""></label> --}}
						                                    </td>
						                                    <td class="t_table">
						                                        {{-- <select class="form-control" id="">
						                                            <option selected>Lý do</option>
						                                            <option value="1">Bệnh</option>
						                                            <option value="2">Công tác</option>
						                                            <option value="3">Thi</option>
						                                        </select> --}}
						                                    </td>
						                                    <td class="t_table">
						                                        <a href="teacher/more2level/deleteStudent/{{$student->id}}/{{$courseId}}" class="btn btn-danger">Xóa </a>
						                                        <!-- Modal start -->
						                                    </td>
						                                </tr>
						                            @endforeach
						                        </tbody>                  
						                    </table>
						                </div>
						            </div>
			                    </div>
			                    {{-- Danh sách giảng viên --}}
			                    <div role="tabpanel" class="tab-pane fade" id="Section3">
						            <div class="panel panel-default">
						                <div>
						                    <div class="col-sm-12" style="margin-top: 10px;">
						                        {{-- <div style="float: right;">
						                            <!-- Modal end -->
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
						                                        <form action="teacher/more2level/registerTeacher" method="POST">
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
						                                <th data-breakpoints="xs" class="t_table">Tên giảng viên</th>
						                                {{-- <th data-breakpoints="xs" class="t_table">Hành động</th> --}}
						                            </tr>
						                        </thead>
						                        <tbody>
					                                @foreach($teachers as $teacher)
						                                <tr data-expanded="true">
						                                    <td class="t_table">{{$teacher->id}}</td>
						                                    <td class="t_table">{{$teacher->teacher_name}}</td>
						                                    {{-- <td class="t_table">
						                                        <a href="teacher/more2level/deleteTeacher/{{$teacher->id}}/{{$courseId}}" class="btn btn-danger">Xóa</a>
						                                        <!-- Modal start -->
						                                    </td> --}}
						                                </tr>
						                            @endforeach
						                        </tbody>                  
						                    </table>
						                </div>
						            </div>
			                    </div>
			                    {{-- Lịch học --}}
			                    <div role="tabpanel" class="tab-pane fade" id="Section4">
			                        <div class="panel-body">
					                    {{-- <div class="form"> --}}
					                        <form class="cmxform form-horizontal " method="post" action="teacher/more2level/addPeriod">
					                        	{!! csrf_field() !!}
					                            <div class="form-group ">
					                                <label for="firstname" class="control-label col-lg-3">Buổi học</label>
					                                <div class="col-lg-8">
					                                    <input class=" form-control" id="period" name="period" type="text" value="" required="">
					                                </div>
					                            </div>
					                            <div class="form-group ">
					                                <label for="skill" class="control-label col-lg-3">Kỹ năng</label>
					                                <div class="col-sm-8">
                                                       <select class="form-control" id="skill" name="skill" required="">
                                                               <option value="Listening">Listening</option>
                                                               <option value="Reading">Reading</option>
                                                               <option value="Writing">Writing</option>
                                                               <option value="Speaking">Speaking</option>
                                                       </select>
                                                    </div>
					                            </div>
					                            <div class="form-group ">
					                                <label for="lastname" class="control-label col-lg-3">Ngày học</label>
					                                <div class="col-lg-8">
					                                    <input class=" form-control" id="date_study" name="date_study" type="date" value="" required="">
					                                </div>
					                            </div>
					                            <div class="form-group ">
					                                <label for="username" class="control-label col-lg-3">Giảng viên phụ trách</label>
					                                <div class="col-sm-8">
                                                       <select class="form-control" name="teacherId" required="">
                                                          @foreach($teachers as $teacher)
                                                               <option value="{{$teacher->teacher_id}}">
                                                                    {{$teacher->teacher_name}} - MSGV: {{$teacher->teacher_id}}
                                                                </option>
                                                           @endforeach
                                                       </select>
                                                    </div>
					                            </div>
					                            <div class="form-group">
					                                <div class="col-lg-offset-3 col-lg-8">
					                                    <button class="btn btn-success" type="submit">Thêm</button>
					                                    <button class="btn btn-default" type="button">Hủy</button>
					                                </div>
					                            </div>
					                            <input type="hidden" name="courseId" value="{{$courseId}}" >
					                            @foreach($courses as $course)
					                            	<input type="hidden" name="startDate" value="{{$course->startDate}}" >
					                            	<input type="hidden" name="endDate" value="{{$course->endDate}}" >
					                            @endforeach
					                            @foreach($data_study as $ds)
			                                    	<input class="form-control " id="id_studyShift" name="id_studyShift" type="hidden"  value="{{$ds->id_studyShift}}">
			                                    @endforeach
					                        </form>
					                    {{-- </div> --}}
					                </div>	
					                <div class="panel panel-default">
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
						                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Buổi</th>
						                                <th data-breakpoints="xs" class="t_table">Ngày học</th>
						                                <th data-breakpoints="xs" class="t_table">Thời gian học</th>
						                                <th data-breakpoints="xs" class="t_table">Giảng viên phụ trách</th>
						                                <th data-breakpoints="xs">Hành động</th>
						                            </tr>
						                        </thead>
						                        <tbody>
						                        	@foreach($periods as $period)
						                           	<tr data-expanded="true">
					                                    <td class="t_table">{{$period->period}}</td>
					                                    <td class="t_table">{{$period->date_study}}</td>
					                                    <td class="t_table">{{$period->start_time}} - {{$period->end_time}}</td>
					                                    <td class="t_table">{{$period->teacher_name}}</td>
					                                    <td>
					                                        {{-- start xóa buổi học --}}
					                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSTModal{{$period->id}}">
					                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
					                                        </button>
					                                        {{-- modal xóa buổi học --}}
					                                        <div class="modal fade" id="deleteSTModal{{$period->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					                                            <div class="modal-dialog" role="document">
					                                                <div class="modal-content">
					                                                    <div class="modal-header cus-modal-header">
					                                                        <h3 class="modal-title" id="exampleModalLabel">Xóa buổi học</h3>
					                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                                                          <span aria-hidden="true">&times;</span>
					                                                        </button>
					                                                    </div>
					                                                    <form action="teacher/more2level/deletePeriod" method="POST">
					                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
					                                                        <input type="hidden" name="id" value="{{$period->id}}">
					                                                        <input type="hidden" name="courseId" value="{{$courseId}}">
					                                                        <div class="modal-body">
					                                                            <p style="font-size: 20px"><b>Bạn muốn xóa buổi học {{$period->period}}:</b></p>
					                                                            <br>
					                                                            <p style="font-size: 15px">
					                                                            	<i class="fa fa-user" aria-hidden="true"></i> 
					                                                            	Giảng viên: {{$period->teacher_name}}
					                                                            </p>
					                                                            <br>
					                                                            <p style="font-size: 15px">
					                                                            	<i class="fa fa-calendar-o" aria-hidden="true"></i> Kỹ năng: {{$period->skill}}
					                                                            </p>
					                                                            <br>
					                                                            <p style="font-size: 15px">
					                                                            	<i class="fa fa-calendar-o" aria-hidden="true"></i> Ngày học: {{$period->date_study}}
					                                                            </p>
					                                                        </div>
					                                                        <div class="modal-footer">
					                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" >Hủy</button>
					                                                            <button type="submit" class="btn btn-success">OK</button>
					                                                        </div>
					                                                    </form>
					                                                </div>
					                                            </div>
					                                        </div>
					                                        {{-- end xóa ca học học --}}
					                                    </td>
					                                </tr> 
					                                @endforeach
						                        </tbody>                  
						                    </table>
						                </div>
						            </div>		                    
					            </div>        
			                    {{-- Tài liệu luyện tập --}}
			                    <div role="tabpanel" class="tab-pane fade" id="Section6">
			                    	<div class="panel panel-default">
			                    		<div class="col-lg-12">
			                    			<div style="margin-left: 85%">
			                    				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDocModal">Thêm tài liệu</button>
		                                        <!-- Modal start -->
		                                        <!-- Modal cập nhật thông tin tài liệu-->
		                                        <div class="modal fade" id="addDocModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		                                            <div class="modal-dialog" role="document">
		                                                <div class="modal-content">
		                                                    <div class="modal-header cus-modal-header">
		                                                        <h3 class="modal-title" id="exampleModalLabel">Thêm tài liệu</h3>
		                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                                                          <span aria-hidden="true">&times;</span>
		                                                        </button>
		                                                    </div>
		                                                    <form action="teacher/more2level/addDocument" method="POST" enctype="multipart/form-data">
		                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
		                                                        <input type="hidden" name="courseId" value="{{$courseId}}" >
		                                                        <div class="modal-body">
		                                                            <div class="row">
		                                                                <div class="col-sm-4">
		                                                                    <label for="doc" class="form_text">Tên tài liệu: </label>
		                                                                </div>
		                                                                <div class="col-sm-8">
		                                                                    <input type="text" class="form-control" id="addNameDoc" name="document_name" required="">
		                                                                </div>
		                                                            </div>
		                                                            <div class="row">
		                                                                <div class="col-sm-4">
		                                                                    <label for="detail" class="form_text">Mô tả: </label>
		                                                                </div>
		                                                                <div class="col-sm-8">
		                                                                    <input type="text" class="form-control" id="addDetailDoc" name="detail_doc" required="">
		                                                                </div>
		                                                            </div>
		                                                            <div class="row">
		                                                            {{-- input upload file --}}
		                                                            <input type="file" class="form-control-file inputfile" id="inputfile" name = "file">
		                                                            <label for="inputfile"><i class="fa fa-upload"></i> <span id="labelFileUpload">Tải tệp lên</span></label>
		                                                            </div>
		                                                            {{-- end input --}}
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
			                    		</div>
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
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên tài liệu</th>
					                                <th data-breakpoints="xs" class="t_table">File</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Download</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Mô tả</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Ngày đăng</th>
					                                <th data-breakpoints="xs">Hành động</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        	@foreach($data_document as $document)
						                            <tr data-expanded="true">
						                                <td class="t_table">{{$document->name}}</td>
						                                <td class="t_table">{{$document->file}}</td>
						                                <td class="t_table">
						                                	<a href="uploads/document/{{$document->file}}" download="{{$document->file}}">
							                                    <button type="button" class="btn btn-outline-info">
							                                        <i class="fa fa-download" aria-hidden="true"></i>
							                                    </button>
							                                </a>
						                                </td>
						                                <td class="t_table">{{$document->detail}}</td>
						                                <td class="t_table">{{$document->date_post}}</td>
						                                <td class>
						                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateExeModal{{$document->id}}">Sửa</button>
						                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteExeModal{{$document->id}}">Xóa</button>
						                                    <!-- Modal start -->
						                                    <!-- Modal cập nhật thông tin tài liệu-->
						                                    <div class="modal fade" id="updateExeModal{{$document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						                                        <div class="modal-dialog" role="document">
						                                            <div class="modal-content">
						                                                <div class="modal-header cus-modal-header">
						                                                    <h3 class="modal-title" id="exampleModalLabel">Cập nhật thông tin tài liệu</h3>
						                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                                                      <span aria-hidden="true">&times;</span>
						                                                    </button>
						                                                </div>
						                                                <form action="teacher/more2level/updateDocument" method="POST">
						                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
						                                                <input type="hidden" name="document_id" value="{{$document->id}}">
						                                                <input type="hidden" name="courseId" value="{{$courseId}}" >
						                                                <div class="modal-body">
						                                                    <div class="row">
						                                                        <div class="col-sm-4">
						                                                            <label for="name_olddoc" class="form_text">Tên tài liệu cũ: </label>
						                                                        </div>
						                                                        <div class="col-sm-8">
						                                                            <input type="text" class="form-control" value="{{$document->name}}" disabled="">
						                                                        </div>
						                                                    </div>
						                                                    <div class="row">
						                                                        <div class="col-sm-4">
						                                                            <label for="name_doc" class="form_text">Tên tài liệu mới: </label>
						                                                        </div>
						                                                        <div class="col-sm-8">
						                                                            <input type="text" class="form-control" id="name_doc" name="name_doc">
						                                                        </div>
						                                                    </div>
						                                                    <div class="row">
						                                                        <div class="col-sm-4">
						                                                            <label for="detail_doc" class="form_text">Mô tả: </label>
						                                                        </div>
						                                                        <div class="col-sm-8">
						                                                            <input type="text" class="form-control" id="detail_doc" name="detail_doc">
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
						                                    <!-- Modal start -->
						                                    <!-- Modal xóa tài liệu-->
						                                    <div class="modal fade" id="deleteExeModal{{$document->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						                                        <div class="modal-dialog" role="document">
						                                            <div class="modal-content">
						                                                <div class="modal-header cus-modal-header">
						                                                    <h3 class="modal-title" id="exampleModalLabel">Xóa tài liệu</h3>
						                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                                                      <span aria-hidden="true">&times;</span>
						                                                    </button>
						                                                </div>
						                                                <form action="teacher/more2level/deleteDocument" method="POST">
						                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
						                                                <input type="hidden" name="document_id" value="{{$document->id}}">
						                                                <input type="hidden" name="courseId" value="{{$courseId}}" >
						                                                <div class="modal-body">
				                                                            <p style="font-size: 20px"><b>Bạn muốn xóa tài liệu luyện tập:</b></p>
				                                                            <br>
				                                                            <p style="font-size: 15px">
				                                                            	<i class="fa fa-file" aria-hidden="true"></i>
				                                                            	Tài liệu: {{$document->name}}
				                                                            </p>
				                                                            <br>
				                                                            <p style="font-size: 15px">
				                                                            	<i class="fa fa-calendar-o" aria-hidden="true"></i> Mô tả: {{$document->detail}}
				                                                            </p>
				                                                            <br>
				                                                            <p style="font-size: 15px">
				                                                            	<i class="fa fa-clock-o" aria-hidden="true"></i> Ngày đăng: {{$document->date_post}}
				                                                            </p>
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
			                    {{-- Điểm thi học viên --}}
			                    <div role="tabpanel" class="tab-pane fade" id="Section7">
			                    	<div class="panel panel-default">
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
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên học viên</th>
					                                <th data-breakpoints="xs" class="t_table">Đề thi</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        	@foreach($student_exam as $exam)
						                            <tr data-expanded="true">
						                                <td class="t_table">
						                                	<a href="teacher/more2level/getWritingTest/{{$exam->id}}">{{$exam->student_name}}</a>
						                                </td>
						                                <td class="t_table">{{$exam->name_exam}}</td>
						                            </tr>
					                            @endforeach
					                        </tbody>
					                    </table>
						            </div>
			                    </div>
			                    {{-- Quản lý điểm --}}
			                    <div role="tabpanel" class="tab-pane fade" id="Section8">
			                    	<div class="panel panel-default">
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
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên học viên</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Writing</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Reading</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Speaking</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Listening</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Overall</th>
					                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Kết quả</th>
					                                <th data-breakpoints="xs">Hành động</th>
					                            </tr>
					                        </thead>
					                        <tbody>
					                        	@foreach($history_score as $hs)
					                            <tr data-expanded="true">
					                                <td class="t_table">{{$hs->student_name}}</td>
					                                <td class="t_table">{{$hs->score_writing}}</td>
					                                <td class="t_table">{{$hs->reading_score}}</td>
					                                <td class="t_table">{{$hs->speaking_score}}</td>
					                                <td class="t_table">{{$hs->listening_score}}</td>
					                                <td class="t_table">{{$hs->score_overall}}</td>
					                                @if($hs->result == "Đạt")
					                                <td class="t_table" style="color: #04AD0B">{{$hs->result}}</td>
					                                @else
					                                <td class="t_table" style="color: red">{{$hs->result}}</td>
					                                @endif
					                                <td>
					                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateScoreModal{{$hs->id}}">Nhập/Sửa</button>
					                                    <!-- Modal sửa tài liệu-->
					                                    <div class="modal fade" id="updateScoreModal{{$hs->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					                                        <div class="modal-dialog" role="document">
					                                            <div class="modal-content">
					                                                <div class="modal-header cus-modal-header">
					                                                    <h3 class="modal-title" id="exampleModalLabel">Sửa điểm thành phần</h3>
					                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                                                      <span aria-hidden="true">&times;</span>
					                                                    </button>
					                                                </div>
					                                                <form action="teacher/more2level/addScore/{{$hs->id}}" method="POST">
					                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
					                                                <input type="hidden" name="courseId" value="{{$courseId}}">
					                                                <div class="modal-body">
			                                                            <div class="row">
					                                                        <div class="col-sm-4">
					                                                            <label for="name_student" class="form_text">Học viên: </label>
					                                                        </div>
					                                                        <div class="col-sm-8">
					                                                            <input type="text" class="form-control" id="name_student" value="{{$hs->student_name}}" disabled="">
					                                                        </div>
					                                                    </div>
					                                                    <div class="row">
					                                                        <div class="col-sm-4">
					                                                            <label for="writing_score" class="form_text">Writing: </label>
					                                                        </div>
					                                                        <div class="col-sm-8">
					                                                            <input type="text" class="form-control" id="writing_score" name="writing_score" value="{{$hs->score_writing}}">
					                                                        </div>
					                                                    </div>
					                                                    <div class="row">
					                                                        <div class="col-sm-4">
					                                                            <label for="reading_score" class="form_text">Reading: </label>
					                                                        </div>
					                                                        <div class="col-sm-8">
					                                                            <input type="text" class="form-control" id="reading_score" name="reading_score" value="{{$hs->reading_score}}">
					                                                        </div>
					                                                    </div>
					                                                    <div class="row">
					                                                        <div class="col-sm-4">
					                                                            <label for="speaking_score" class="form_text">Speaking: </label>
					                                                        </div>
					                                                        <div class="col-sm-8">
					                                                            <input type="text" class="form-control" id="speaking_score" name="speaking_score" value="{{$hs->speaking_score}}">
					                                                        </div>
					                                                    </div>
					                                                    <div class="row">
					                                                        <div class="col-sm-4">
					                                                            <label for="listening_score" class="form_text">Listening: </label>
					                                                        </div>
					                                                        <div class="col-sm-8">
					                                                            <input type="text" class="form-control" id="listening_score" name="listening_score" value="{{$hs->listening_score}}">
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
					                                </td>
					                            </tr>
					                            @endforeach
					                        </tbody>
					                    </table>
						            </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
  		</div>
    </section>
</section>
<!--main content end-->
@endsection