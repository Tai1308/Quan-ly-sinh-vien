@extends('student.layout.index_student')
@section('content')
<!--main content start-->
<style type="text/css">
	.disabled_write{

	}
</style>
<section id="main-content">
	<section class="wrapper">
		{{-- <div class="table-agile-info"> --}}
			<div class="panel panel-default">
				<div class="col-lg-12 cover">
					@foreach($data_writing as $dw)
					<div class="col-lg-7">
						<h2>TEST SECTION</h2>
						<hr/>
						<div class="clock_manager">
							<div class="time_do_writing">Time:<div class="clock_div_time" id="abc"></div></div>
						</div>
						<div class="clock_title">
							<div class="time_do_test">WRITING</div>
						</div>
						<div class="task1">
							<div class="body_task1">
								<div class="w_task1">
									<strong><u>Writing task 1</u></strong>
								</div>
								<div class="title_task1">
									<strong>You should spend about 20 minutes on this task</strong>
								</div>
								<div class="content_task1">
									{{$dw->content_task1}}
								</div>
								<img class="image" src="uploads/images/{{$dw->chart_task1}}" alt="">
							</div>
							<div class="footer_task1">
								<strong>Write at least 150 words.</strong>
							</div>
						</div>
						<div class="task1">
							<div class="body_task1">
								<div class="w_task2">
									<strong><u>Writing task 2</u></strong>
								</div>
								<div class="title_task2">
									<strong>You should spend about 40 minutes on this task.</strong>
								</div>
								<div class="content_task2">
									{{$dw->content_task2}} 
								</div>
							</div>
							<div class="footer_task2">
								<strong>Write at least 250 words.
								</strong>
							</div>
						</div>
					</div>
					@endforeach
					@foreach($detail_course as $dc)
					<form action="student/studentTest/submitWriting/{{$dc->id}}" method="POST" id="form_writing">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="col-lg-5">
							<h2>ANSWER SECTION</h2>
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
								<div class="tab-content">
									<div class="tab-item" id="tab-main-info">
										<div class="count_character1" id="character_task1"><strong></strong></div>
										<textarea class="do_writing" name="writing_task1" id="writing_task1" cols="48" rows="38" placeholder="Enter your answer task 1..."></textarea>
									</div>
									<div class="tab-item" id="tab-image">
										<div class="count_character2"  id="character_task2">0</div>
										<textarea class="do_writing" name="writing_task2" id="writing_task2" cols="48" rows="38" placeholder="Enter your answer task 2..."></textarea>
									</div>
								</div>
							</div>
							<button type="submit" class="button_submit btn btn-secondary">
								<strong>Submit</strong>
							</button>								
						</div>
					</form>
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
	<script>
		$("#writing_task1").keyup(function()
		{
			message = document.getElementById('writing_task1');
			text = message.value;
			count = text.split(" ");
			//onsole.log(count);
			document.getElementById('character_task1').innerHTML = count.length ;
			count_length = count.length;
			if((count.length) < 150)
			{
				document.getElementById('character_task1').style.color = "black";
			}
			if((count.length) >= 150)
			{
				document.getElementById('character_task1').style.color = "red";
				var string = "";	
				$.each( count, function( key, value ) {
				  if(key < 150){
				  	string += value+" ";
				  }
				});
				// console.log($('#writing_task1').val());
				$('#writing_task1').val(string);
			}
		});
	</script>
	</script>
	<script>
		$("#writing_task2").keyup(function()
		{
			message = document.getElementById('writing_task2');
			text = message.value;
			count = text.split(" ");
			//onsole.log(count);
			document.getElementById('character_task2').innerHTML = count.length ;
			count_length = count.length;
			if((count.length) < 250)
			{
				document.getElementById('character_task2').style.color = "black";
			}
			if((count.length) >= 250)
			{
				document.getElementById('character_task2').style.color = "red";
				var string = "";	
				$.each( count, function( key, value ) {
				  if(key < 250){
				  	string += value+" ";
				  }
				});
				// console.log($('#writing_task2').val());
				$('#writing_task2').val(string);
			}
		});

	</script>
		<script type="text/javascript">
			function sendtest()
			{
				let form =  $('#form_writing').serialize();
				@foreach($detail_course as $dc)
				url="student/studentTest/submitWriting/{{$dc->id}}"
				urlresult="student/studentTest/getSubmitTest/{{$dc->id}}"
				@endforeach
				$.ajax({
					type: "POST",
					url: url,
					data: form,
					success: window.location.href=urlresult,
				});
			}
			function getTimeRemaining(endtime) {
				var t = Date.parse(endtime) - Date.parse(new Date())
				var seconds = Math.floor((t / 1000) % 60);
				var minutes = Math.floor((t / 1000 / 60) % 60);
				var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
				return {
					'total': t,
					'hours': hours,
					'minutes': minutes,
					'seconds': seconds
				};
			}
			function initializeClock(id, endtime,time) {
				var clock = document.getElementById(id);
				var hoursSpan = clock.querySelector('.hours');
				var minutesSpan = clock.querySelector('.minutes');
				var secondsSpan = clock.querySelector('.seconds');
				function updateClock() {
					var t = getTimeRemaining(endtime);
					hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
					minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
					secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
					if (t.total == 0) { 
						clearInterval(timeinterval);
						alert('Hết thời gian làm bài');
						sendtest();
					}
				}
				updateClock();
				var timeinterval = setInterval(updateClock, 1000);
			}

			$( ".clock_div_time" ).html('<div id="clockdiv"><div class="smalltext hidden" ><strong><span class="days"></span>&nbsp; Days</strong></div><center><strong><span class="hours"></span>&nbsp;: </strong><strong><span class="minutes"></span> :&nbsp;</strong><strong><span class="seconds"></span>&nbsp;</strong></center></div>');
			$( ".clock_div_time" ).append()    
			var deadline = new Date(Date.parse(new Date()) + 1 * 1 * 60 * 60 * 1000);
			initializeClock('clockdiv', deadline,60);
		</script>
		<!--main content end-->
		@endsection
