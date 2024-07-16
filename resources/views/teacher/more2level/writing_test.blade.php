@extends('teacher.layout.index_teacher')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        {{-- <div class="table-agile-info"> --}}
            <div class="panel panel-default">
               <div class="col-lg-12 cover_course">
               		@foreach($data_writing as $dt)
	               		<div class="col-lg-12 cover_header_course">
							<div class="history_test_course"><i class="fa fa-th-list" aria-hidden="true"></i>
								<strong><u>BÀI THI WRITING</u></strong>
							</div>
							<div>
								<strong>ĐỀ THI WRITING CỦA KỲ THI: {{$dt->name_exam}}</strong>
							</div>
							<div>
								<div class="col-lg-4 cover_info_course">
									<div>Họ tên học viên: {{$dt->student_name}}</div>
									<div>Thời gian làm bài viết: 60 (Phút)</div>
								</div>
							</div>
						</div>
	               		<div class="col-lg-7">
	               			<h2>TEST SECTION</h2>
	               			<hr/>
			            	<div class="clock_title_course">
					    		<div class="time_do_test_course">WRITING</div>
			            	</div>
	               			<div class="task1_course">
	               				<div class="body_task1_course">
					            	<div class="w_task1_course">
					            		<strong><u>Writing task 1</u></strong>
					            	</div>
					            	<div class="title_task1_course">
					            		<strong>You should spend about 20 minutes on this task</strong>
					            	</div>
					            	<div class="content_task1_course">
					            		{{$dt->content_task1}}
									</div>
									<img class="image_course" src="uploads/images/{{$dt->chart_task1}}" alt="">
				            	</div>
				            	<div class="footer_task1_course">
					            		<strong>Write at least 150 words.</strong>
					            </div>
	               			</div>
	               			 <div class="task1_course">
	               				<div class="body_task1_course">
					            	<div class="w_task2_course">
					            		<strong><u>Writing task 2</u></strong>
					            	</div>
					            	<div class="title_task2_course">
					            		<strong>You should spend about 40 minutes on this task.</strong>
					            	</div>
					            	<div class="content_task2_course">
					            		{{$dt->content_task2}}
									</div>
				            	</div>
				            	<div class="footer_task2_course">
					            	<strong>Write at least 250 words.
									</strong>
					            </div>
	               			</div>
	               		</div>
	               		<div class="col-lg-5">
	               			<h2>ANSWER SECTION</h2>
	               			<hr/>
	               			<div class="tab-wrapper_course">
							    <ul class="tab">
							        <li>
							            <a href="#tab-main-info">Task 1</a>
							        </li>
							        <li>
							            <a href="#tab-image">Task 2</a>
							        </li>
							    </ul>
							    <div class="tab-content_course">
							        <div class="tab-item_course" id="tab-main-info">
							            <textarea class="do_writing_course" name="writing_task1" id="writing_task1" cols="48" rows="35" placeholder="Enter your answer task 1...">{{$dt->writing_task1}}</textarea>
							        </div>
							        <div class="tab-item_course" id="tab-image">
							            <textarea class="do_writing_course" name="writing_task2" id="writing_task2" cols="48" rows="35" placeholder="Enter your answer task 2...">{{$dt->writing_task2}}</textarea>
							        </div>
							    </div>
							</div>
							<form action="admin/more2level/addScoreWriting/{{$dt->id}}" method="POST">
								{!! csrf_field() !!}
								<div>
									<input type="text" class="form-control score_writing_course" name="score_writing" placeholder="SCORE">
								</div>
								<button type="submit" class="button_submit_course btn btn-secondary">
									<strong>Submit</strong>
								</button>
								@foreach($id_course as $id)
									<input type="hidden" name="courseId" value="{{$id->courseId}}">
								@endforeach
							</form>								
	               		</div>
	               	@endforeach
               </div>
            </div>
        {{-- </div> --}}
    </section>
</section>
<script type="text/javascript">
	// Hàm active tab nào đó
	function activeTab(obj)
	{
	    // Xóa class active tất cả các tab
	    $('.tab-wrapper_course ul li').removeClass('active');
	 
	    // Thêm class active vòa tab đang click
	    $(obj).addClass('active');
	 
	    // Lấy href của tab để show content tương ứng
	    var id = $(obj).find('a').attr('href');
	 
	    // Ẩn hết nội dung các tab đang hiển thị
	    $('.tab-item_course').hide();
	 
	    // Hiển thị nội dung của tab hiện tại
	    $(id) .show();
	}
		// Sự kiện click đổi tab
	$('.tab li').click(function(){
	    activeTab(this);
	    return false;
	});
</script>
<!--main content end-->
@endsection
