@extends('teacher.layout.index_teacher')
@section('content')
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row" style="margin-top: 50px; margin-left: 30px;">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                      <img src="images/course1.PNG" class="d-block w-100" alt="First slide">
                    </div>
                    <div class="item">
                      <img src="images/couse2.PNG" class="d-block w-100" alt="Second slide">
                    </div>
                    <div class="item">
                      <img src="images/course3.PNG" class="d-block w-100" alt="Third slide">
                    </div>
                </div>
{{--                 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> --}}
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection