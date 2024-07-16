@extends('admin.layout.index')
@section('content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        DANH SÁCH KHÓA HỌC CỦA {{ $student->student_name }} ({{ $student->student_id }})
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khóa học</th>
                                    <th>Khóa học</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $key => $course)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->category->name ?? '' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(session('thongbao'))
                    <div class="alert alert-success" style="margin-top: 20px">
                        {{session('thongbao')}}
                    </div>
                @endif
            </div>
        </section>
    </section>
@endsection