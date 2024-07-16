@extends('student.layout.index_student')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                 THƯ VIỆN TÀI LIỆU
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
                            <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">ID</th>
                            <th data-breakpoints="xs" class="t_table">Tên khóa học</th>
                            <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Ngày bắt đầu</th>
                            <th class="t_table">Ngày kết thúc</th>
                          </tr>
                        </thead>
                        <tbody>
                        	@foreach($data_document as $dc)
	                            <tr data-expanded="true">
	                                <td class="t_table">{{$dc->id}}</td>
	                                <td class="t_table">
	                                	<a href="student/studentDocument/getDocument/{{$dc->id}}">{{$dc->name}}</a>
	                                </td>
	                                <td class="t_table">{{$dc->startDate}}</td>
	                                <td class="t_table">{{$dc->endDate}}</td>
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
