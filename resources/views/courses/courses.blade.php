@extends('layouts.master')
@section('title','All Courses')

@section('content')
<div class="jumbotron move2">
    <div class="container">
    <h1>Available Courses</h1>
    </div>
</div>
<div class="container" style="min-height: 180px">
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">All Courses</li>
    </ul>

    <div class="row previews">
    @if($courses)
        @foreach($courses as $course)
            <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="thumbnail">
                <a href="/courses/{{ $course->slug }}" class="post-image-link">
                    <p>
                        <img src="http://i1.ytimg.com/vi/{{ $course->video_id }}/hqdefault.jpg" class="img-responsive img" alt="Course Image">
                    </p>
                </a>
                <div class="caption">
                    <h3>{{ $course->course }}</h3>
                    <p>{{ $course->section }}</p>
                    <a href="/courses/{{ $course->slug }}" class="btn btn-primary btn-raised">Start Course</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
  </div>
</div>
@endsection