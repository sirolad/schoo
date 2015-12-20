@extends('layouts.master')
@section('title', 'Schoo | Learning For Humans')
<!--landing page-->
@section('custom-css')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection
@section('content')
<div>
  <div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li class="item1 active"></li>
      <li class="item2"></li>
      <li class="item3"></li>
      <li class="item4"></li>
      <li class="item5"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1449244973/photodune-4161018-group-of-students-m_agr1vv.jpg" alt="Chania" class="cover">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>Learning online without boundaries.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450071559/nad_myc1e4.jpg" alt="Chania" width="460" height="345" class="cover">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>There is something for all ages.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450070600/high-school-students_zzuylo.jpg" alt="Flower" class="cover">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>Over 1000 courses teaching with fun.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450070944/29969-students-face_vn03ed.jpg" alt="Flower" class="cover">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>My secret place for all school assignments.</p>
        </div>
      </div>

      <div class="item">
        <img src="http://res.cloudinary.com/dqmv6brld/image/upload/v1450137757/cchub_gqtlew.jpg" class="cover">
        <div class="carousel-caption">
          <h3>Schoo</h3>
          <p>Laying the Foundation for Future Generations.</p>
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
<div class="container">
  <br>
  <h3 style="text-align: center" class="some">Featured Courses</h3>
  <div class="row previews">
    @if($courses)
        @foreach($courses as $course)
            <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="thumbnail back">
                <a href="/courses/{{ $course->slug }}" class="post-image-link">
                    <p>
                        <img src="http://i1.ytimg.com/vi/{{ $course->video_id }}/hqdefault.jpg"
                        class="img-responsive img" alt="Course Image">
                    </p>
                </a>
                <div class="caption">
                    <h3>{{ $course->course}}</h3>
                    <p>{{ $course->section }}</p>
                    <a href="/courses/{{ $course->slug }}" class="btn btn-primary btn-raised">Start Course</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
  </div>
</div>
<!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Services</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Over 1000 Courses</strong>
                                </h4>
                                <p>Our Courses Span all fields of Human Knowlegde.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-compass fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Best Tutorials</strong>
                                </h4>
                                <p>Second to none Pedagogical Practices ever implemented.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-flask fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Practical</strong>
                                </h4>
                                <p>Elucidative Delivery make our Courses very Practical.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-shield fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Certified Courses</strong>
                                </h4>
                                <p>Our Courses Span are Approved By UNESCO.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
@endsection