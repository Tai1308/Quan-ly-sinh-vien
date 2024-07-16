@extends('admin.layout.index')
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
                 DANH SÁCH CA HỌC
                </div>
				<div class="tab-content">
					<div class="col-sm-9" style="margin-top: 10px;">
                        <div style="margin-left: 115%">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSSModal">Thêm mới</button>
                            <!-- Modal start -->
                            <!-- Modal cập nhật thông tin nhân viên-->
                            <div class="modal fade" id="addSSModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header cus-modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Thêm ca học</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="admin/list/addStudyShift" method="POST">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="name_studyShift" class="form_text">Tên ca học: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" id="name_studyShift" name="name_studyShift" required="">
                                                    </div>
                                                </div>
												<div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="start_time" class="form_text">Thời gian bắt đầu: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="time" class="form-control" id="start_time" name="start_time" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label for="end_time" class="form_text">Thời gian kết thúc: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <input type="time" class="form-control" id="end_time" name="end_time" required="">
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
	                                <th data-breakpoints="xs" class="t_table">Tên ca học</th>
	                                <th data-breakpoints="xs" class="t_table">Thời gian bắt đầu</th>
	                                <th data-breakpoints="xs" class="t_table">Thời gian kết thúc</th>
	                                <th data-breakpoints="xs" class="t_table" >Hành động</th>
	                            </tr>
	                        </thead>
	                        <tbody id="tableBody">
                                @foreach($data_studyShift as $dt)
    	                            <tr data-expanded="true">
    	                                <td class="t_table" >{{$dt->name_studyShift}}</td>
    	                                <td class="t_table" >{{$dt->start_time}}</td>
    	                                <td class="t_table" >{{$dt->end_time}}</td>
    	                                <td class="t_table" >
                                        {{-- start xem thông tin thời gian học --}}
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#seeSTModal{{$dt->id}}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </button>
                                        {{-- modal xem thông tin thời gian học --}}
                                        <div class="modal fade" id="seeSTModal{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Thông tin ca học</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="name_studyShift" class="form_text">Tên ca học: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name_studyShift" name="name_studyShift" required="" value="{{$dt->name_studyShift}}" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="start_time" class="form_text">Mô tả: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="start_time" name="start_time" required="" value="{{$dt->start_time}}" disabled="">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="end_time" class="form_text">Mô tả: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="end_time" name="end_time" required="" value="{{$dt->end_time}}" disabled="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" >Hủy</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end xem thông tin thời gian học --}}
                                        {{-- start sửa thông tin thời gian học --}}
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateSTModal{{$dt->id}}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                        {{-- modal sửa thông tin thời gian học --}}
                                        <div class="modal fade" id="updateSTModal{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin ca học</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="admin/list/updateStudyShift" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$dt->id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="name_studyShift" class="form_text">Tên ca học: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name_studyShift" name="name_studyShift" required="" value="{{$dt->name_studyShift}}" >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="start_time" class="form_text">Thời gian bắt đầu: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="time" class="form-control" id="start_time" name="start_time" required="" value="{{$dt->start_time}}" >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="end_time" class="form_text">Thời gian kết thúc: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="time" class="form-control" id="end_time" name="end_time" required="" value="{{$dt->end_time}}" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" >Hủy</button>
                                                            <button type="submit" class="btn btn-success">OK</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end sửa thông tin thời gian học --}}
                                        {{-- start xóa ca học học --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSTModal{{$dt->id}}">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </button>
                                        {{-- modal xóa ca học --}}
                                        <div class="modal fade" id="deleteSTModal{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Xóa ca học</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="admin/list/deleteStudyShift" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$dt->id}}">
                                                        <div class="modal-body">
                                                            <p style="font-size: 20px">Bạn muốn xóa <b>{{$dt->name_studyShift}}</b>?</p>
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
	                            @endforeach()
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