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
            {{-- @if(session('loi'))
                <div class="alert alert-danger" style="margin-top: 20px">
                    {{session('loi')}}
                </div>  
            @endif --}}
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-top: 20px">
                    {{session('thongbao')}}
                </div>  
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                 NGÂN HÀNG CÂU HỎI
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
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">ID</th>
                                <th data-breakpoints="xs" class="t_table" style="width: 75%">Trình độ</th>
                                {{-- <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Số lượng chủ đề</th> --}}
                                <th data-breakpoints="xs">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($level_question as $lv)
                                <tr data-expanded="true">
                                    <td class="t_table">{{$lv->id}}</td>
                                    <td class="t_table">
                                        <a href="teacher/test/chuyende/{{$lv->id}}">{{$lv->name_level}}</a>
                                    </td>
                                    {{-- <td class="t_table">60</td> --}}
                                    <td>
                                        {{-- start sửa thông tin trình độ --}}
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateQuestion{{$lv->id}}">Sửa</button>
                                        {{-- modal sửa thông tin trình độ --}}
                                        <div class="modal fade" id="updateQuestion{{$lv->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin trình độ câu hỏi</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="teacher/test/updateLevelQuestion" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$lv->id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="name_level" class="form_text">Tên trình độ: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name_level" name="name_level" required="" value="{{$lv->name_level}}" >
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
                                        {{-- end sửa thông tin trình độ --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <div>
                            {{-- <div class="col-sm-3" style="margin-top: 10px">
                                <div class="box">
                                    <form action="" method="POST">
                                        <div class="container-1">
                                            <a href="#" class="icon"><i class="fa fa-search"></i></a>
                                            <input type="text" name="search" id="search" placeholder="Tìm kiếm" />
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                            <div class="col-sm-12" style="margin-top: 10px;">
                                <div style="margin-left: 90%">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addLV">Thêm mới</button>
                                    <!-- Modal start -->
                                    <!-- Modal cập nhật thông tin nhân viên-->
                                    <div class="modal fade" id="addLV" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header cus-modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Thêm danh mục trình độ</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="teacher/test/addLevelQuestion" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="name_level" class="form_text">Tên danh mục trình độ</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="name_level" name="name_level" required="">
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
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection