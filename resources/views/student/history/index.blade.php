@extends('student.layout.index_student')
@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        KẾT QUẢ HỌC TẬP
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
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên học viên</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Khóa học</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Writing</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Reading</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Speaking</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Listening</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Overall</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Overall</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($histories as $key => $history)
                                <tr data-expanded="true">
                                    <td class="t_table">{{ $history->student_name }}</td>
                                    <td class="t_table">{{ $history->course_name }}</td>
                                    <td class="t_table">{{$history->score_writing}}</td>
                                    <td class="t_table">{{$history->reading_score}}</td>
                                    <td class="t_table">{{$history->speaking_score}}</td>
                                    <td class="t_table">{{$history->listening_score}}</td>
                                    <td class="t_table">{{$history->score_overall}}</td>
                                    @if($history->result == "Đạt")
                                        <td class="t_table" style="color: #04AD0B">{{$history->result}}</td>
                                    @else
                                        <td class="t_table" style="color: red">{{$history->result}}</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </section>
    </section>
    <!--main content end-->
@endsection