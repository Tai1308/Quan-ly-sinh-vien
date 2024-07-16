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
                 BỘ CÂU HỎI
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
                                <th data-breakpoints="xs" class="t_table" style="width: 70%">Câu hỏi</th>
                                <th data-breakpoints="xs">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($questions as $question)
                                <tr data-expanded="true">
                                    <td class="t_table">{{$question->id}}</td>
                                    <td class="t_table">{{$question->content_question}}</td>
                                    <td>
                                        <a href="teacher/test/cauhoi/{{$question->id}}">
                                           <button type="button" class="btn btn-info" data-toggle="modal">Chi tiết</button>
                                        </a>
                                        {{-- start xóa thông tin trình độ --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteQuestionModal{{$question->id}}">Xóa</button>
                                        <div class="modal fade" id="deleteQuestionModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header cus-modal-header">
                                                        <h3 class="modal-title" id="exampleModalLabel">Xóa câu hỏi</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="teacher/test/deleteQuestion" method="POST">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="id" value="{{$question->id}}">
                                                        <div class="modal-body">
                                                            <p style="font-size: 17px"><b>Chắc chắn bạn muốn xóa câu hỏi?</b></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning" data-dismiss="modal" >Hủy</button>
                                                            <button type="submit" class="btn btn-success">OK</button>
                                                        </div>
                                                        <input type="hidden" name="id_subject" value="{{$id_subject}}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                <div style="margin-left: 80%">
                                    <a href="teacher/test/importQuestion/{{$id_subject}}"><button type="button" class="btn btn-success">Import</button></a>
                                    <a href="teacher/test/addQuestion/{{$id_subject}}">
                                        <button type="button" class="btn btn-success" data-toggle="modal">Thêm mới</button>
                                        <input type="hidden" name="id_subject" value="{{$id_subject}}" >
                                    </a>
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