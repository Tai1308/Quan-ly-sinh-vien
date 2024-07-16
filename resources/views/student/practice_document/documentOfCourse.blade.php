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
                            <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Tên tài liệu</th>
                            <th class="t_table">Ngày đăng</th>
                            <th data-breakpoints="xs" class="t_table">File</th>
                            <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Download</th>
                            <th class="t_table">Mô tả</th>
                          </tr>
                        </thead>
                        <tbody>
                        	@foreach($data_documentCourse as $ddc)
	                            <tr data-expanded="true">
	                                <td class="t_table">{{$ddc->name}}</td>
	                                <td class="t_table">{{$ddc->date_post}}</td>
	                                <td class="t_table">{{$ddc->file}}</td>
	                                <td class="t_table">
	                                	<a href="uploads/document/{{$ddc->file}}" download="{{$ddc->file}}">
		                                    <button type="button" class="btn btn-outline-info">
		                                        <i class="fa fa-download" aria-hidden="true"></i>
		                                    </button>
		                                </a>
	                                </td>
	                                <td class="t_table">{{$ddc->detail}}</td>
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
