@extends('layouts.master')
@section('title','Search Results')

@section('content')
<div class="jumbotron move2">
    <div class="container">
    <h1>Search Results</h1>
    </div>
</div>
<div class="container" style="min-height: 180px">
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Search</li>
    </ul>

    @if(! $courses)
      <div>
          <h4 style="text-align: center; margin-top: 20px">No results found for your query.</h4>
      </div>
      @endif

      <div class="row previews">
    @if($courses)
        @foreach($courses as $course)
            <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="thumbnail">
                <a href="/courses/{{ $course->id }}" class="post-image-link">
                    <p>
                        <img src="http://i1.ytimg.com/vi/{{ $course->video_id }}/hqdefault.jpg" class="img-responsive" alt="Course Image">
                    </p>
                </a>
                <div class="caption">
                    <h3>{{ $course->course}}</h3>
                    <p>{{ $course->description }}</p>
                    <a href="/courses/{{ $course->id }}" class="btn btn-primary btn-raised">Start Course</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
  </div>
</div>