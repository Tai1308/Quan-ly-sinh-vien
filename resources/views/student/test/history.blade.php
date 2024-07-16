@extends('student.layout.index_student')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 DANH SÁCH BÀI THI
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
		                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên bài thi</th>
		                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Ngày thi</th>
		                    </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($data_exam as $de)
			                    <tr data-expanded="true">
			                    	<td class="t_table">
			                    		<a href="student/studentTest/historyOfCourse/{{$de->id}}">{{$de->name_exam}}</a>
			                    	</td>
			                        <td class="t_table">{{$de->date_exam}}</td>
			                    </tr>
		                    @endforeach
	                    </tbody>
	                 </table>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection
