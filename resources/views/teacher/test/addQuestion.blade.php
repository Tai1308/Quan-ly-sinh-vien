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
            <div class="panel panel-default">
                <div class="panel-heading">
                 THÊM CÂU HỎI MỚI
                </div>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " id="signupForm" method="POST" action="teacher/test/addQA" novalidate="novalidate">
                        	{!! csrf_field() !!}
                        	@foreach($question_subject as $qs)
	                            <div class="form-group ">
	                                <label for="danhmuc_add" class="control-label col-lg-3">Danh mục hiện tại</label>
	                                <div class="col-lg-8">
	                                    <input class=" form-control" id="danhmuc_add" name="danhmuc_add" type="text" value="{{$qs->name_subject}}" style="margin-top: auto;" disabled>
	                                </div>
	                            </div>
                            @endforeach
                            <div class="form-group ">
                                <label for="content_question" class="control-label col-lg-3">Nội dung câu hỏi</label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" id="content_question" name="content_question" type="textarea" value=""></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="cau_traloi_add" class="control-label col-lg-3">Câu trả lời</label>
                            </div>
                            <div class="form-group ">
                                <label for="da1_add" class="control-label col-lg-3">1</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="da1_add" name="answer[answer_1]" type="text" value="" style="margin-top: auto;">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="da2_add" class="control-label col-lg-3" >2</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="da2_add" name="answer[answer_2]" type="text" value="" style="margin-top: auto;">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="da3_add" class="control-label col-lg-3">3</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="da3_add" name="answer[answer_3]" type="text" value="" style="margin-top: auto;">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="da4_add" class="control-label col-lg-3">4</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="da4_add" name="answer[answer_4]" type="text" value="" style="margin-top: auto;">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="correct_sentence_add" class="control-label col-lg-3">Đáp án</label>
                                <div class="col-lg-3">
                                    <label for="correct_sentence" class="control-label col-lg-2">1</label>
                                    <label for="correct_sentence" class="control-label col-lg-2" style="margin-left: 10%">2</label>
                                    <label for="correct_sentence" class="control-label col-lg-2" style="margin-left: 10%">3</label>
                                    <label for="correct_sentence" class="control-label col-lg-2"style="margin-left: 10%">4</label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-lg-12">
                                    <input type="radio" name="correct_add" value="answer_1" style="margin-top: 11px; margin-left: 271px">
                                    <input type="radio" name="correct_add"value="answer_2" style="margin-top: 11px; margin-left: 42px">
                                    <input type="radio" name="correct_add" value="answer_3" style="margin-top: 11px; margin-left: 42px">
                                    <input type="radio" name="correct_add" value="answer_4" style="margin-top: 11px; margin-left: 42px">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-8">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a href=""><button class="btn btn-default" type="button">Hủy</button></a>
                                </div>
                            </div>
                            <input type="hidden" name="id_subject" value="{{$id_subject}}" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection