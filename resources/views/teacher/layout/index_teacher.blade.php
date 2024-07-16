<!DOCTYPE html>
<head>
<title>ECHO LAND</title>
<base href="{{asset('')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="ECHO LAND" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="admin_asset/js/jquery-3.4.1.min.js"></script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="admin_asset/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="admin_asset/css/style.css" rel='stylesheet' type='text/css' />
<link href="admin_asset/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<!-- font-awesome icons -->
<link rel="stylesheet" href="admin_asset/css/font.css" type="text/css"/>
<link href="admin_asset/css/font-awesome.css" rel="stylesheet">  
<!-- //font-awesome icons -->
<link rel="stylesheet" href="admin_asset/css/index.css" >
<link rel="stylesheet" href="admin_asset/css/infoCourse.css" >
<!--  ========OwlCarousel2======== -->
<link rel="stylesheet" type="text/css" href="admin_asset/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css" >
<link rel="stylesheet" type="text/css" href="admin_asset/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
<!--  ======== -->
<link rel="stylesheet" href="admin_asset/css/bootstrap.min.css" >
<link href="admin_asset/css/font-awesome.css" rel="stylesheet">  
<link rel="stylesheet" type="text/css" href="admin_asset/css/test.css" />
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
    @php $admin = Auth::user();@endphp
<div class="brand">
    <a href="teacher/homeTeacher/indexHome" class="logo">
        ECHO LAND
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        @if(Auth::user())
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/cover.jpg">
                <span class="username">{{Auth::user()->name}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="teacher/info_teacher/getUpdateAccount/{{Auth::user()->id}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a></li>
                <li><a href="logout"><i class="fa fa-key"></i>Đăng xuất</a></li>
            </ul>
        </li>
        @endif
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="{{ (request()->is('teacher/homeTeacher/homeTeacher'))?'active':'' }}" href="teacher/homeTeacher/homeTeacher">
                        <i class="fa fa-home"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                
                <li>
                <li>
                    <a href="#">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <span>Danh mục</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a class="{{(request()->is('admin/list/studyTime'))?'active':'' }}" href="admin/list/studyTime">Thời gian học</a>
                        </li>
                        <li>
                            <a class="{{(request()->is('admin/list/studyShift'))?'active':'' }}" href="admin/list/studyShift">Ca học</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#">
                        <i class="fa fa-calendar-o"></i>
                        <span>Quản lý khóa học</span>
                    </a>
                    <ul class="sub">
                        @foreach($categories as $category)
                            <li><a class="{{ (request()->is('"admin/more2level/courseIntensive/'.$category->id)) ? 'active':'' }}" href="admin/more2level/courseIntensive/{{ $category->id }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a class="{{(request()->is('teacher/schedule/teachingSchedule'))?'active':'' }}" href="teacher/schedule/teachingSchedule">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span>Đăng ký lịch giảng dạy</span>
                    </a>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!-- rightbar start -->
@yield('content')
<!-- rightbar start -->
</section>
<script>
</script>

<script src="admin_asset/js/bootstrap.js"></script>
<script src="admin_asset/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="admin_asset/js/scripts.js"></script>
<script src="admin_asset/js/jquery.slimscroll.js"></script>
<script src="admin_asset/js/jquery.nicescroll.js"></script>
<script src="admin_asset/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="admin_asset/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
<script type="text/javascript" src="admin_asset/OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
</script>
{{-- Script chọn tất cả checkbox --}}
<script>
    $("#checkall").change(function(){
        $(".checkitem").prop("checked",$(this).prop("checked"))
    })
    $(".checkitem").change(function(){
        if($(this).prop("checked") == false){
            $("#checkall").prop("checked", false)
        }
        if($(".checkitem:checked").length == $(".checkitem").length){
            $("#checkall").prop("checked", true)
        }
    })
</script>
<script>
    $(document).ready(function(){
      $("#buoihocSelect").change(function(){
        const id = $(this).val(); 
        if(+id > 0){
            $.get(`admin/ajax/buoihoc/${id}`, function(data, status){
              $('#tableBody').html(data);
            });
        }
      });

      $("body").on('click','#thamgia_buoihoc',function(){
        var value = 0;
        if ($(this).is(':checked')) {
            value = 1;
        }
        
        var register = $(this).attr('data-register');
        var period = $(this).attr('data-period');

        $.get(`admin/ajax/diemdanh/thamgia/${value}/${register}/${period}`, function(data, status){
        });
      });

      $("body").on('click','#vang_buoihoc',function(){
        var value = 0;
        if ($(this).is(':checked')) {
            value = 1;
        }
        
        var register = $(this).attr('data-register');
        var period = $(this).attr('data-period');

        $.get(`admin/ajax/diemdanh/vang/${value}/${register}/${period}`, function(data, status){
        });
      });

      $("body").on('change','#lydovang_buoihoc',function(){
        var value = $(this).val();        
        var register = $(this).attr('data-register');
        var period = $(this).attr('data-period');

        $.get(`admin/ajax/diemdanh/lydovang/${value}/${register}/${period}`, function(data, status){
        });
      });
    });
</script>
</body>
</html>