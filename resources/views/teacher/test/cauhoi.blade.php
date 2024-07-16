@extends('teacher.layout.index_teacher')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 CHI TIẾT CÂU HỎI
                </div>
                <div class="panel-body">
                    <div class="form">

                            <form class="cmxform form-horizontal " id="signupForm" method="" action="" novalidate="novalidate">
                                @foreach($question as $q)
                                    <div class="form-group ">
                                        <label for="danhmuc" class="control-label col-lg-3">Danh mục hiện tại</label>
                                        <div class="col-lg-8">
                                            <input class=" form-control" id="danhmuc" name="danhmuc" type="text" value="{{$q->name_subject}}" disabled="" style="margin-top: auto;">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="ma_cauhoi" class="control-label col-lg-3">Mã câu hỏi</label>
                                        <div class="col-lg-8">
                                            <input class=" form-control" id="ma_cauhoi" name="ma_cauhoi" type="text" value="{{$q->id}}" style="margin-top: auto;">
                                        </div>
                                    </div> 
                                    <div class="form-group ">
                                        <label for="noidung_cauhoi" class="control-label col-lg-3">Nội dung câu hỏi</label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" id="noidung_cauhoi" name="noidung_cauhoi" type="textarea">{{$q->content_question}}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group ">
                                    <label for="cau_traloi" class="control-label col-lg-3">Câu trả lời</label>
                                </div>
                                <div class="form-group ">
                                    @foreach($answer as $a)
                                    <label for="da1" class="control-label col-lg-3"></label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="da1" name="da1" type="text" value="{{$a->content_answer}}" style="margin-top: auto; margin-bottom: 10px">
                                    </div>
                                    @endforeach
                                </div>
                                {{-- <div class="form-group ">
                                    <label for="da2" class="control-label col-lg-3" >2</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="da2" name="da2" type="text" value="" style="margin-top: auto;">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="da3" class="control-label col-lg-3">3</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="da3" name="da3" type="text" value="" style="margin-top: auto;">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="da4" class="control-label col-lg-3">4</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="da4" name="da4" type="text" value="" style="margin-top: auto;">
                                    </div>
                                </div> --}}
                                <div class="form-group ">
                                    <label for="corecct_sentence" class="control-label col-lg-3">Đáp án</label>
                                    <div class="col-lg-3">
                                        <label for="corecct_sentence" class="control-label col-lg-2" style="margin-left: 24px">1</label>
                                        <label for="corecct_sentence" class="control-label col-lg-2" style="margin-left: 10px">2</label>
                                        <label for="corecct_sentence" class="control-label col-lg-2" style="margin-left: 10px">3</label>
                                        <label for="corecct_sentence" class="control-label col-lg-2"style="margin-left: 10px">4</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-12">
                                        <label for="corecct_sentence" class="control-label col-lg-2"style="margin-left: 10%"></label>
                                        @foreach($answer as $a)
                                        <input type="radio" name="corect" style="margin-top: 11px; margin-left: 30px"
                                            @if($a->correct_sentence == 1)
                                                checked
                                            @endif
                                        >
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-8">
                                        @foreach($question as $q)
                                            <a href="teacher/test/khocauhoi/{{$q->id_subject}}"><button class="btn" type="button">Hủy</button></a>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection