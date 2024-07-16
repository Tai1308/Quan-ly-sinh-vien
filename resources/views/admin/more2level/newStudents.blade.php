@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
              <div class="panel-heading">
               THÊM HỌC VIÊN VÀO KHÓA HỌC
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
                      	<th data-breakpoints="xs" class="t_table">
                      		<label>
                            <input type="checkbox" id="checkall" value="">
                          </label>
                      	</th>
                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">MSHV</th>
                        <th data-breakpoints="xs" class="t_table">Họ và tên</th>
                        <th data-breakpoints="xs sm md" data-title="DOB" class="t_table">Số điện thoại</th>
                        <th class="t_table">Gmail</th>
                        <th class="t_table">Mục tiêu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form action="admin/more2level/registerStudent" method="post">
                      {!! csrf_field() !!}
                      <div style="margin-left: 79%; margin-top: 10px;">
                          <button type="submit" class="btn btn-success">Thêm học viên vào khóa học</button>
                      </div>
                      @foreach($exstudents as $student)
                      	<tr data-expanded="true">
                      		<td class="t_table">
                      			<label><input type="checkbox" name="student_attend[]" class="checkitem" value="{{$student->student_id}}"></label>
                      		</td>
                          <td class="t_table">{{$student->student_id}}</td>
                          <td class="t_table">{{$student->student_name}}</td>
                          <td class="t_table">{{$student->phone}}</td>
                          <td class="t_table">{{$student->email}}</td>
                          <td class="t_table">{{$student->target_point}}</td>
                      	</tr>
                        <input type="hidden" name="courseId" value="{{$courseId}}" >
                        <input type="hidden" name="student_name[]" value="{{$student->student_name}}" >
                      @endforeach
                    </form>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection

