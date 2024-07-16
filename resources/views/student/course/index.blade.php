@extends('student.layout.index_student')
@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        TỔNG QUAN KHÓA HỌC
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
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Mã học viên</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên học viên</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên lớp học</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Thời gian học</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Ca học</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Học phí</th>
                                <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $key => $course)
                                <tr data-expanded="true">
                                    <td class="t_table">{{ $course->studentId }}</td>
                                    <td class="t_table">{{ $course->student_name }}</td>
                                    <td class="t_table">
                                        <p>{{ $course->course_name }}</p>
                                    </td>
                                    <td class="t_table">
                                        <p>{{ $course->startDate }} -> {{ $course->endDate }}</p>
                                        {{ $course->name_studyTime }}
                                    </td>
                                    <td class="t_table">{{ $course->name_studyShift }}</td>
                                    <td class="t_table">{{number_format($course->tuition)}} đ</td>
                                    <td class="t_table">
                                        @if($course->status == 1)
                                            <p>Đã nộp</p>
                                        @else
                                            <p>Chưa nộp</p>
                                        @endif
                                    </td>


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