@extends('student.layout.index_student')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
		<div class="container-fluid bg-info">
			@foreach($detail_course as $dc)
				<form action="student/studentTest/postAnswer/{{$dc->id}}" id="form_1" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="col-xs-10 col-sm-10 col-md-9 col-lg-9">
					    <div class="modal-dialog">
					    	<div class="box_clock">
						    	<div class="clock_time">
						    		<div class="time_do_test">Time: </div>
						    	<div class="clock_div" id="abc"></div>
				            	</div>
			            	</div>
					    	<div class="owl-carousel owl-theme">
					    		@foreach($data_test as $dt)
							    <div class="item">
							    	<div class="modal-content">
								        <div class="modal-header" style="color: #000">
								            <div class="box_big_question">
								            	<span class="label label-warning" id="qsid">{{$dt['stt']}}</span>
								            	<div class="box_question">
								            {{$dt['content_question']}}
								            </div>
								        </div>
								        </div>
								        <div class="modal-body">							       
									         <div class="quiz" id="quiz" data-toggle="buttons">
									         	@foreach($dt['answer'] as $key => $vlanswer)
									          		<label class="element-animation1 btn btn-lg btn-warning btn-block" id="testQues_2[{{$dt['stt']}}][{{$key}}]">
									          			<span class="btn-label"><i class="glyphicon fa fa-chevron-right" aria-hidden="true" style="color: #fff" ></i></span>
									          			<input type="radio" name="qustion[question][{{$dt['stt']}}][user_anwer]" value="{{$vlanswer->id_answer}}">{{$vlanswer->content_answer}}</label>
									          		{{-- script --}}
								          			<script>
								          				document.getElementById('testQues_2[{{$dt['stt']}}][{{$key}}]').onclick =function(){
								          					var checkbox=document.getElementsByName('qustion[question][{{$dt['stt']}}][user_anwer]')
								          					var result = "";
								          								$('#testQuestion{{$dt['stt']}}').attr('checked','true')	
								          					}
								          			</script>
								          		@endforeach
								          		{{-- @foreach($dt['id_question'] as $vlid) --}}
								          			<input type="hidden" name="qustion[question][{{$dt['stt']}}][id_question]" value="{{$dt['id_question']}}">
								          		{{-- @endforeach --}}
									       	</div>
									    </div>
									</div>
							    </div>
							    @endforeach
							</div>
						</div>
					</div>
					<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3 col_fix">
						<div class="box_seeing">
							<label class="label_seeing">OVERVIEW</label>
							@foreach($data_test as $dt)
								<div class="box_435">
									<div class="name_question">Question {{$dt['stt']}}</div>
									<div class="input_seeing">
										<input type="checkbox" name="gender" value="other" disabled="" id="testQuestion{{$dt['stt']}}">
									</div>
								</div>
							@endforeach
							<div class="col-md-12">
							{{-- <a href="student/studentTest/writingTest/{{$dc->id}}"> --}}
								<button type="button" onclick="sendtest()" class="btn btn-info">Writing Section</button>
							{{-- </a> --}}
							</div>
							@foreach($data_course as $dc)
								<input type="hidden" name="id_student" value="{{$dc->id_student}}">
							@endforeach
						</div>
					</div>
				</form>
			@endforeach
		</div>
    </section>
</section>
<style type="text/css">
	.quiz > label{
		margin-top: 5px;
    	margin-bottom: 5px;
	}

	.input_seeing{
		text-align: center;
	}
	.input_seeing > input{
		height: 20px;
		width: 20px;
	}
    
	.box_435{
		display: inline-block;
		margin-right: 10px;
		margin-left: 10px;
	}
	.box_seeing{
		text-align: center;
		border: #dcdcdc solid 1px;
		padding: 20px;
		border-radius: 5px;
		background-color: #fff;
		height: 100vh; 
		overflow: scroll;
	}
	.col_fix{
		position: fixed;
		right: 0px;
	}
	.label_seeing{
		font-size: 20px;
		color: #f7913d;
		display: block;
	}
	.name_question{
		color: #000;
	}
</style>
<script type="text/javascript">
	function sendtest()
	{
		let form =  $('#form_1').serialize();
		@foreach($detail_course as $dc)
			url="student/studentTest/postAnswer/{{$dc->id}}"
			urlwriting="student/studentTest/writingTest/{{$dc->id}}"
		@endforeach
		$.ajax({
		  type: "POST",
		  url: url,
		  data: form,
		  success: window.location.href=urlwriting,
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
                            alert('Hết thời gian làm bài. Tiếp tục thực hiện phần thi viết.');
                            sendtest();
                    }
        }
        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    $( ".clock_div" ).html('<div id="clockdiv"><div class="smalltext hidden" ><strong><span class="days"></span>&nbsp; Days</strong></div><center><strong><span class="hours"></span>&nbsp;: </strong><strong><span class="minutes"></span> :&nbsp;</strong><strong><span class="seconds"></span>&nbsp;</strong></center></div>');
    @foreach($time as $t)
    $( ".clock_div" ).append()    
    var deadline = new Date(Date.parse(new Date()) + 1 * 1 * {{$t->time}} * 60 * 1000);
    initializeClock('clockdiv', deadline,{{$t->time}});
    @endforeach
</script>
<!--main content end-->
@endsection
