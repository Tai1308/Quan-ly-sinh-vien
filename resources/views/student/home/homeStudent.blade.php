@extends('student.layout.index_student')
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
            </div>
        </div>
    </section>
</section>
<!--main content end-->
@endsection