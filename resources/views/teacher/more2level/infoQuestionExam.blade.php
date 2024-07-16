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
                            @foreach($data_question as $dq)
                                <div class="form-group ">
                                    <label for="ma_cauhoi" class="control-label col-lg-3">Mã câu hỏi</label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="ma_cauhoi" name="ma_cauhoi" type="text" value="{{$dq->id_question}}" style="margin-top: auto;" disabled="">
                                    </div>
                                </div> 
                                <div class="form-group ">
                                    <label for="noidung_cauhoi" class="control-label col-lg-3">Nội dung câu hỏi</label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" id="noidung_cauhoi" name="noidung_cauhoi" type="textarea">{{$dq->content_question}}</textarea>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group ">
                                <label for="cau_traloi" class="control-label col-lg-3">Câu trả lời</label>
                            </div>
                            <div class="form-group ">
                                @foreach($data_answer as $valueDA)
                                    <label for="da1" class="control-label col-lg-3"></label>
                                    <div class="col-lg-8">
                                        <input class=" form-control" id="da1" name="da1" type="text" value="{{$valueDA->content_answer}}" style="margin-top: auto; margin-bottom: 10px">
                                    </div>
                                @endforeach
                            </div>
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
                                    @foreach($data_answer as $valueDA)
                                        <input type="radio" name="corect" style="margin-top: 11px; margin-left: 30px"
                                            @if($valueDA->correct_sentence == 1)
                                                checked
                                            @endif
                                        >
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-8">
                                    <a href=""><button class="btn" type="button">Hủy</button></a>
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