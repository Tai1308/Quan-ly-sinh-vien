@extends('student.layout.index_student')
@section('content')
<!--main content start-->
<style type="text/css">
	.check_correct{
		background-color:#eeeeee;
		color: #45BF31;
		font-weight: 600;
		display: flex;
	}
	.check_correct_1{
		background-color:#eeeeee;
		color: #45BF31;
		font-weight: 600;
		display: flex;

	}
	.check_correct2{
		background-color: #FFE6D9;
		color: red;
		font-weight: 600;
		display: flex;
	}
	.answer{
		display: flex;
	}
	.check_correct > input{
		display: inline-block;

	}
	.ans1 > input{
		width: 20px;
		height: 20px;
	}
	.check_correct2 > input{
		display: inline-block;
	}
	.ans > input{
		display: inline-block;
	}
	.ans{
		display: inline-block;
		margin-top: 2px;
		margin-left: 5px;
		width: 100%;
		word-break: break-all;
	}
	.ans1{
		display: inline-block;

	}
</style>
<section id="main-content">
	<section class="wrapper">
		{{-- <div class="table-agile-info"> --}}
			<div class="panel panel-default">
				<div class="col-lg-12 overview_test">
					<div class="col-lg-12 cover_header">
						<div class="history_test"><i class="fa fa-th-list" aria-hidden="true"></i> 
							<strong><u>LỊCH SỬ BÀI THI</u></strong>
						</div>
						<div>
							<strong>ĐỀ THI: FINAL_TEST_INTENSIVE05102019</strong>
						</div>
						<div>
							<div class="col-lg-4 cover_info">
								<div>Họ tên học viên: {{$name_user}}</div>
								<div>Thời gian làm bài trắc nghiệm: 
									@foreach($time_test as $tt)
										{{$tt->time}} (Phút)
									 @endforeach
								</div>
								<div>Thời gian làm bài viết: 60 (Phút)</div>

							</div>
							<div class="col-lg-4">
								@foreach($data_correct as $dc)
									<div>Số câu trả lời đúng: {{$dc->quantity_correct}}</div>
									<div>Số câu trả lời sai: {{$dc->quantity_incorrect}}</div>
									<div>Tổng điểm phần thi trắc nghiệm: {{$dc->score}}</div>
								@endforeach
							</div>
							<div class="col-lg-4">
								<div>Phần thi viết: 
									<strong>Giáo viên chưa chấm phần thi này</strong>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 cover_test">
						<div class="col-lg-7">
							<h2>TEST SECTION</h2>
							<hr/>
							@foreach($list_question as $lq)
							@foreach($lq['question'] as $key => $question_list)
							<div class="cover_question">
								<div class="question"><strong>Question : {{$question_list->content_question}}</strong></div>
								<div class="cover_answer">
									@foreach($lq['anwer'] as $key => $anwer)
										@if(($lq['result_anwer']==$anwer->id)&&($anwer->correct_sentence==1)) 
											<div class="answer check_correct_1">
												<div class="ans1">
												<input type="radio" checked name="answer['{{$question_list->id}}']" value="" disabled=""> 
												</div>
												<div class="ans"> {{$anwer->content_answer}}</div>
											</div>
										@elseif(($lq['result_anwer']==$anwer->id)&&($anwer->correct_sentence!=1))
											<div class="answer check_correct2">
												<div class="ans1">
												<input type="radio" checked name="answer['{{$question_list->id}}']" value="" disabled=""> 
											</div>
												<div class="ans"> {{$anwer->content_answer}}</div>
											</div>
										@elseif($anwer->correct_sentence==1)
											<div class="answer check_correct">
												<div class="ans1">
												<input type="radio"  name="answer['{{$question_list->id}}']" value="" disabled=""> 
											</div>
												<div class="ans"> {{$anwer->content_answer}}</div>
											</div>
										@else
											<div class="answer">
												<div class="ans1">
												<input type="radio"  name="answer['{{$question_list->id}}']" value="" disabled=""> 
											</div>
												<div class="ans"> {{$anwer->content_answer}}</div>
											</div>
										@endif
									@endforeach
								</div>
							</div>

							@endforeach
							@endforeach
						</div>
						<div class="col-lg-5">
							<h2>WRITING SECTION</h2>
							<hr/>
							<div class="tab-wrapper">
								<ul class="tab">
									<li>
										<a href="#tab-main-info">Task 1</a>
									</li>
									<li>
										<a href="#tab-image">Task 2</a>
									</li>
								</ul>
								@foreach($result_writing as $rw)
								<div class="tab-content">
									<div class="tab-item" id="tab-main-info">
										<textarea class="do_writing" name="" id="" cols="48" rows="38">{{$rw->writing_task1}}
										</textarea>
									</div>
									<div class="tab-item" id="tab-image">
										<textarea class="do_writing" name="" id="" cols="48" rows="38">{{$rw->writing_task2}}
										</textarea>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</div>
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
	    $('.tab-wrapper ul li').removeClass('active');

	    // Thêm class active vòa tab đang click
	    $(obj).addClass('active');

	    // Lấy href của tab để show content tương ứng
	    var id = $(obj).find('a').attr('href');

	    // Ẩn hết nội dung các tab đang hiển thị
	    $('.tab-item').hide();

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
