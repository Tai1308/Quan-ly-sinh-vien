@extends('admin.layout.index')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
    <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-fw fa-mortar-board fas"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Số lượng học viên</span>
                        <span class="info-box-number">
                          {{ $student }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-calendar-o fas"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Số lượng lớp học</span>
                        <span class="info-box-number">
                          {{ $courseDetail }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fa fa-fw fa-dollar"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số doanh thu</span>
                        <span class="info-box-number">
                          {{ number_format($totalMoney)  }} vnđ
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div id="chartContainer" style="height: 300px; width: 100%;" data_chart="{{ $dataChart }}"></div>
            </div>
        </div>

        <div>
            <h2 class="text-center" style="text-transform: uppercase; margin-top: 30px">Thống kê lớp học </h2>
            <table class="table" ui-jq="footable" ui-options='{
	                    "paging": {
	                      "enabled": true
	                    },
	                    "filtering": {
	                      "enabled": true
	                    },
	                    "sorting": {
	                      "enabled": true
	                    }}'
            >
                <thead>
                <tr>
                    <th data-breakpoints="xs" class="t_table">STT</th>
                    <th data-breakpoints="xs" class="t_table">Tên Lớp</th>
                    <th data-breakpoints="xs" class="t_table">Số lượng học viên</th>
                    <th data-breakpoints="xs" class="t_table">Thuộc khóa học</th>
                
                </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($students as $key => $student)
                    <tr data-expanded="true">
                        <td class="t_table" >{{ $key + 1 }}</td>
                        <td class="t_table" >{{$student->name}}</td>
                        <td class="t_table" >{{$student->students->count()}}</td>
                        <td class="t_table" >{{$student->category->name}}</td>
                        
                    </tr>
                @endforeach()
                </tbody>
            </table>
        </div>

        <div>
            <h2 class="text-center" style="text-transform: uppercase; margin-top: 30px">Thống kê doanh thu </h2>
            <table class="table" ui-jq="footable" ui-options='{
	                    "paging": {
	                      "enabled": true
	                    },
	                    "filtering": {
	                      "enabled": true
	                    },
	                    "sorting": {
	                      "enabled": true
	                    }}'
            >
                <thead>
                <tr>
                    <th data-breakpoints="xs" class="t_table">STT</th>
                    <th data-breakpoints="xs" class="t_table">Tên Lớp</th>
                    <th data-breakpoints="xs" class="t_table">Số Học phí</th>
                </tr>
                </thead>
                <tbody id="tableBody">
                @foreach($students as $key => $student)
                    <tr data-expanded="true">
                        <td class="t_table" >{{ $key + 1 }}</td>
                        <td class="t_table" >{{$student->name}}</td>
                        <td class="t_table" >{{number_format($student->students->sum('tuition'))}} đ</td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
        </div>
    </section>
</section>
<!--main content end-->
<script>
window.onload = function () {
    let dataChart = $("#chartContainer").attr('data_chart');
    dataChart  =  JSON.parse(dataChart);

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: "THỐNG KÊ SỐ LƯỢNG KHÓA HỌC KHAI GIẢNG"
        },
        axisY: {
            title: "Lớp học",
            suffix: "(lớp)",
            includeZero: false
        },
        axisX: {
            title: "Khóa học"
        },
        data: [{
            type: "column",
            dataPoints: dataChart
        }],
    });
    chart.render();

}
</script>
@endsection
