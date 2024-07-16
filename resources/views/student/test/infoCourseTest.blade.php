@extends('student.layout.index_student')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">

            <div class="panel panel-default">
                <div class="panel-heading">
                 KỲ THI ĐÁNH GIÁ KẾT QUẢ HỌC TẬP
                </div>
                <div class="panel-body">
                    <div class="form">
                    	@foreach($detail_course as $dc)
	                    <form class="cmxform form-horizontal " id="signupForm" method="" action="student/studentTest/test/{{$dc->id}}" novalidate="novalidate">
                            <div class="form-group ">
                                <label for="name_course" class="control-label col-lg-3">Tên lớp học</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="name_course" name="name_course" type="text" value="{{$dc->name}}" style="margin-top: auto;" disabled="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="startDate" class="control-label col-lg-3">Ngày bắt đầu</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="startDate" name="startDate" type="text" value="{{$dc->startDate}}" style="margin-top: auto;" disabled="">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="endDate" class="control-label col-lg-3">Ngày kết thúc</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="endDate" name="endDate" type="text" value="{{$dc->endDate}}" style="margin-top: auto;" disabled="">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="studyTime" class="control-label col-lg-3">Thời gian học</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="studyTime" name="studyTime" type="text" value="{{$dc->name_studyTime}}" style="margin-top: auto;" disabled="">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="studyShift" class="control-label col-lg-3">Ca học</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="studyShift" name="studyShift" type="text" value="{{$dc->name_studyShift}}" style="margin-top: auto;" disabled="">
                                </div>
                            </div> 
                            <div class="form-group ">
                                <label for="guide" class="control-label col-lg-3">Hướng dẫn làm bài thi</label>
                                <div class="col-lg-8">
                                    <textarea name="" id="" cols="87" rows="4" disabled="" style="padding-top: 15px; padding-left: 15px; padding-right: 15px; background-color: #FFE6CE">Học viên thực hiện bài thi test với thời gian {{$dc->time}} (phút) và bài thi viết 60 (phút) . Học viên thực hiện bài thi trong thời gian quy định. Hết thời gian làm bài nếu học viên chưa thực hiện xong bài thi hệ thống sẽ tự động nộp bài và kết thúc bài thi. Nhấn nút "Bắt đầu thi" để làm bài!
                                    </textarea>
                                </div>
                            </div> 
	                        <div class="form-group">
                                @if($date_now == $date_exam)
                                    @if($history == 0)
                                        <div class="col-lg-offset-3 col-lg-8">
                                            <button class="btn btn-success"  type="submit" style="margin-left:30%">Bắt đầu thi</button>
                                        </div>
                                    @else
                                        <div class="col-lg-offset-3 col-lg-8">
                                        <button class="btn btn-danger" type="button" disabled style="margin-left:30%">Bạn đã thực hiện bài thi</button>
                                        </div>
                                    @endif
                                @else
                                    <div class="col-lg-offset-3 col-lg-8">
                                        <button class="btn btn-danger"  type="button" disabled="" style="margin-left:5%">Chưa đến ngày thi</button>
                                    </div>
                                @endif
                               
                                
                            </div>
	                    </form> 
	                    @endforeach       
               		</div>
               	</div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection
