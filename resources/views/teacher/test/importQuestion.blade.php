@extends('teacher.layout.index_teacher')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
        	@if(count($errors) > 0)
                <div class="alert alert-danger" style="margin-top: 20px">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger" style="margin-top: 20px">
                    {{session('loi')}}
                </div>  
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success" style="margin-top: 20px">
                    {{session('thongbao')}}
                </div>  
            @endif
        	<div class="panel panel-default">
                <div class="panel-heading">
                 IMPORT CÂU HỎI
 			    <span class="tools pull-right">
                    <a class="fa fa-chevron-down" style="margin-top: 20px; margin-right: 10px;" href="javascript:;"></a>
                </span>
                </div>
    			<div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizonta" method="POST" enctype="multipart/form-data" action="{{ url('teacher/test/importExcelQuestion')}}" novalidate="novalidate">
                        {{ csrf_field() }}
                            <div class="form-group ">
                                <label class="control-label col-lg-3"><p style="margin-left: 110px;">Import File</p></label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="file" name="select_file" type="file">
                                </div>
                                <input type="submit" name="upload" value="Import" class="btn btn-primary">
                                <input type="hidden" name="id_subject" value="{{$id_subject}}" >
                                <a href="{{url('/uploads/file_excel/question_sample.xlsx')}}">
                                    <button type="button" class="btn btn-outline-info">
                                        <i class="fa fa-download" aria-hidden="true"> Tải file mẫu</i>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection