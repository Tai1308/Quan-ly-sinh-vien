@extends('teacher.layout.index_teacher')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 KHO CHUYÊN ĐỀ
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
                                <th data-breakpoints="xs" class="t_table" style="width: 75%">Chủ đề</th>
                                {{-- <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Số lượng câu hỏi</th> --}}
                                <th data-breakpoints="xs">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_subject as $ds)
                                <tr data-expanded="true">
                                    <td class="t_table">{{$ds->id}}</td>
                                    <td class="t_table">
                                        <a href="teacher/test/khocauhoi/{{$ds->id}}">{{$ds->name_subject}}</a>
                                    </td>
                                    {{-- <td class="t_table">60</td> --}}
                                    <td>
                                        {{-- start sửa thông tin chuyên đề --}}
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateSubject{{$ds->id}}">Sửa</button>
                                        {{-- modal sửa thông tin Chuyên đề --}}
                                        <div class="modal fade" id="updateSubject{{$ds->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin chuyên đề câu hỏi</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="teacher/test/updateSubjectQuestion" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$ds->id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label for="name_subject" class="form_text">Tên chuyên đề: </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="name_subject" name="name_subject" required="" value="{{$ds->name_subject}}" >
                                                                </div>
                                                            </div>   
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" >Hủy</button>
                                                            <button type="submit" class="btn btn-success">OK</button>
                                                        </div>
                                                        <input type="hidden" name="id_level" value="{{$id_level}}" >
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end sửa thông tin chuyên đề --}}
                                        {{-- start xóa thông tin trình độ --}}
                                        {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubjectModal{{$ds->id}}">Xóa</button>
                                        <div class="modal fade" id="deleteSubjectModal{{$ds->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Xóa chủ đề câu hỏi</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="teacher/test/deleteSubjectQuestion" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$ds->id}}">
                                                        <div class="modal-body">
                                                            <p style="font-size: 17px"><b>Chắc chắn bạn muốn xóa chuyên đề câu hỏi? Khi xóa chuyên đề, sẽ đồng thời xóa:</b></p>
                                                            <br>
                                                            <p style="font-size: 15px">
                                                                <i class="fa fa-trash-o" aria-hidden="true"></i> Tất cả câu hỏi thuộc trình độ {{$ds->name_subject}}
                                                            </p> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" >Hủy</button>
                                                            <button type="submit" class="btn btn-success">OK</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> --}}
                                        {{-- end xóa thông tin trình độ --}}
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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addCD">Thêm mới</button>
                                    <!-- Modal start -->
                                    <!-- Modal cập nhật thông tin nhân viên-->
                                    <div class="modal fade" id="addCD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header cus-modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Thêm mới chủ đề</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="teacher/test/addSubjectQuestion" method="POST">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label for="chude" class="form_text">Tên chủ đề</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="chude" name="chude" required="">
                                                            </div>
                                                        </div>                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Hủy</button>
                                                        <button type="submit" class="btn btn-success">OK</button>
                                                    </div>
                                                    <input type="hidden" name="id_level" value="{{$id_level}}" >
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