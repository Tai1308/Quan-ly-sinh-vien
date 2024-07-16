<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Đăng nhập</title>
    <base href="{{asset('')}}">
    <link rel="icon" href="admin_asset/images/logo.ico">
    <link rel="stylesheet" href="admin_asset/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="admin_asset/css/style-signin.css" />
    <link rel="stylesheet" href="admin_asset/fontawesome-free-5.5.0-web/css/all.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lobster|Pacifico|Varela+Round" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="title-box">
            <div class="chuyen-title">
                <p class="title-login">We will accompany you!</p>
            </div>
        </div>
        <div class="box-login">
            <div class="in-to-up">
                <div class="login">
                    <img src="images/ieltskey_logo.png">
                    <form action="admin/login" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <p>Đăng nhập</p>
                        <input type="email" id="username" placeholder="Email" name="email" required="">
                        <br>
                        <input type="password" id="password" placeholder="Password" name="password" required="">
                        <br>
                        <div class="remember">
                            <input type="checkbox" name="remember" value="remember"><span> Ghi nhớ tôi</span>
                        </div>
                        <br>
                        <button href="#" class="button-login" name="btn_login">Đăng nhập <i class="fas fa-sign-in-alt"></i></button>
                        {{-- <br>
                        <a href="forgotpass.html" class="forgot-pass" title="Hỗ trợ lấy lại mật khẩu">Quên mật khẩu?</a>
                        <hr /> --}}
                    </form>
                    <p class="go-register">Anh ngữ chìa khóa thành công </p>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger" style="margin-top: 20px">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success" style="margin-top: 20px">
                            {{session('thongbao')}}
                        </div>
                    @endif
                </div>
                <div class="background">
                    <p id="p1">Welcome</p>
                    <p id="p2">Đồng hành cùng ECHO LAND - Thành công và vững bước.</p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="admin_asset/js/signup.js"></script>
</body>
<!-- InstanceEnd -->
</html>