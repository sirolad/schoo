@extends('layouts.master')
@section('title', 'Schoo | Learning For Humans')

@section('custom-css')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection
@section('content')
<div class="span12">
  <h2>Activate Carousel with JavaScript</h2>
  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1 active"></li>
      <li class="item2"></li>
      <li class="item3"></li>
      <li class="item4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1449244973/photodune-4161018-group-of-students-m_agr1vv.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>Learning online without boundaries.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450071559/nad_myc1e4.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>There is something for all ages.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450070600/high-school-students_zzuylo.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>Over 1000 courses teaching with fun.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450070944/29969-students-face_vn03ed.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>My secret place for all school assignment.</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();

    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#myCarousel").carousel(3);
    });

    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>

@endsection