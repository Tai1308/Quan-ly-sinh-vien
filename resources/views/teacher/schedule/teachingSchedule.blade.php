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
                 ĐĂNG KÝ LỊCH GIẢNG DẠY
                </div>
				<div class="tab-content" style="margin-top: 5%">
	                <div class="form">
	                    <form class="cmxform form-horizontal " method="POST" action="teacher/schedule/addTeachingSchedule">
	                    	{!! csrf_field() !!}
	                        <div class="form-group ">
	                            <label for="teacher_register" class="control-label col-lg-3">Giảng viên</label>
	                            <div class="col-lg-8">
	                                <select class="form-control" id="exampleFormControlSelect1" name="id_teacher">
	                                	@foreach($data_teacher as $dt)
									    	<option value="{{$dt->teacher_id}}">{{$dt->teacher_name}}</option>
									    @endforeach
								    </select>
	                            </div>
	                        </div>
							<div class="form-group ">
	                            <label for="studyTime" class="control-label col-lg-3">Thời gian học</label>
	                            <div class="col-lg-8">
	                                <select class="form-control" id="studyTime" name="id_studyTime">
									    <option value="" selected="">---</option>
										@foreach($data_studyTime as $dst)
									    	<option value="{{$dst->id}}">{{$dst->name_studyTime}}</option>
									    @endforeach
								    </select>
	                            </div>
	                        </div>
	                        <div class="form-group ">
	                            <label for="studyShift" class="control-label col-lg-3">Ca học</label>
	                            <div class="col-lg-8">
	                                <select class="form-control" id="studyShift" name="id_studyShift">
									    <option value="">---</option>
									    @foreach($data_studyShift as $dss)
									    	<option value="{{$dss->id}}">{{$dss->name_studyShift}} ({{$dss->start_time}} - {{$dss->end_time}})</option>
									    @endforeach
								    </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-lg-offset-3 col-lg-8">
	                                <button class="btn btn-primary" type="submit">Đăng ký</button>
	                            </div>
	                        </div>
	                    </form>
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
	                    }}'
	                    >
	                        <thead>
	                            <tr>
	                                <th data-breakpoints="xs" class="t_table">Tên giảng viên</th>
	                                <th data-breakpoints="xs" class="t_table">Thời gian đăng ký</th>
	                                <th data-breakpoints="xs" class="t_table">Ca đăng ký</th>
	                                <th data-breakpoints="xs">Hành động</th>
	                            </tr>
	                        </thead>
	                        <tbody id="tableBody">
	                        	@foreach($data_schedule as $ds)
	                            <tr data-expanded="true">
	                                <td class="t_table" >{{$ds->teacher_name}}</td>
	                                <td class="t_table" >{{$ds->name_studyTime}}</td>
	                                <td class="t_table" >{{$ds->name_studyShift}}</td>
	                                <td>
	                                    {{-- start xem lịch đăng ký --}}
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#seeTSModal{{$ds->id_ts}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        {{-- modal xem lịch đăng ký --}}
                                        <div class="modal fade" id="seeTSModal{{$ds->id_ts}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Lịch đăng ký	</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="font-size: 15px">
                                                        	<i class="fa fa-user" aria-hidden="true"></i> 
                                                        	<b>{{$ds->teacher_name}}</b>
                                                        </p>
                                                        <br>
                                                        <p style="font-size: 15px">
                                                        	<i class="fa fa-calendar-o" aria-hidden="true"></i> 
                                                        	<b>Thời gian học: {{$ds->name_studyTime}}</b>
                                                        </p>
                                                        <br>
                                                        <p style="font-size: 15px">
                                                        	<i class="fa fa-clock-o" aria-hidden="true"></i> 
                                                        	<b>Ca học: {{$ds->start_time}} - {{$ds->end_time}}</b>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal" >Thoát</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
	                                    {{-- start xóa lịch đăng ký --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTSModal{{$ds->id_ts}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                        {{-- modal xóa lịch đăng ký --}}
                                        <div class="modal fade" id="deleteTSModal{{$ds->id_ts}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Xóa lịch đăng ký	</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="teacher/schedule/deleteTeachingSchedule" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$ds->id_ts}}">
                                                        <div class="modal-body">
                                                            <p style="font-size: 20px"><b>Bạn muốn xóa lịch đăng ký lịch dạy:</b></p>
                                                            <br>
                                                            <p style="font-size: 15px">
                                                            	<i class="fa fa-user" aria-hidden="true"></i> {{$ds->teacher_name}}
                                                            </p>
                                                            <br>
                                                            <p style="font-size: 15px">
                                                            	<i class="fa fa-calendar-o" aria-hidden="true"></i> Thời gian học: {{$ds->name_studyTime}}
                                                            </p>
                                                            <br>
                                                            <p style="font-size: 15px">
                                                            	<i class="fa fa-clock-o" aria-hidden="true"></i> Ca học: {{$ds->start_time}} - {{$ds->end_time}}
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
	                                </td>
	                            </tr>
	                            @endforeach
	                        </tbody>                  
	                    </table>
	                </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection