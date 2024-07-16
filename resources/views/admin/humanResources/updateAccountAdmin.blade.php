@extends('admin.layout.index')
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
                 CHỈNH SỬA THÔNG TIN TÀI KHOẢN
                </div>
                <div class="panel-body">
                    <div class="form">
                    	@foreach($data_user as $du)
                        <form class="cmxform form-horizontal " id="signupForm" method="POST" action="admin/humanResources/postUpdateAccountAdmin/{{$du->id}}" novalidate="novalidate">
                        	{!! csrf_field() !!}
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Tên người dùng:</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="name" name="name" type="text" value="{{$du->name}}" style="margin-top: auto;" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="email" class="control-label col-lg-3">Email:</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" name="email" type="email" value="{{$du->email}}" style="margin-top: auto;" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Mật khẩu:</label>
                                <div class="col-lg-8">
                                    <input class=" form-control" id="password" name="password" type="password" value="" style="margin-top: auto;" required="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="role" class="control-label col-lg-3">Phân quyền:</label>
                                <div class="col-lg-8">
                                    <select class="form-control" id="role" name="role"  required="">
                                        <option value="1">Tài khoản admin</option>
                                        <option value="2">Tài khoản giảng viên</option>
                                        <option value="3">Tài khoản học viên</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-8">
                                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                                    <a href=""><button class="btn btn-default" type="button">Hủy</button></a>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection