@extends('layouts.master')
@section('title', 'A course')

@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

@section('content')

<div class="container move">
<div class="jumbotron">
  <h3>{{ $course->course }}</h3>
</div>

<div class="span8">
  <div class="row">
    <div class="col-sm-8">
      <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $course->video_id }}"></iframe>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="jumbotron">
        <h3>About Course</h3>
        <small>{{ $course->description }}</small>
        <br>
        <br>
        <h3>Section</h3>
        <small>{{ $course->section }}</small>
        <br>
        <br>
        <h3>Created By</h3>
        <small>{{ $course->user->username }}</small>
        <br>
        <br>
        @can('owner-can-see', $course)
        <div class="btn-group">
          <a href="/courses/{{ $course->id }}/edit" class="btn btn-raised btn-info">Edit</a>
          <a class="btn btn-raised btn-danger delete" data-id="{{ $course->id }}">Delete <i class="fa fa-trash-o"></i></a>
        </div>
        @endcan
      </div>
      <a href="/all-courses" class="btn btn-info btn-xlarge btn-raised" style="margin-left:40px;">See All Courses <span class="glyphicon glyphicon-share-alt"></span></a>
    </div>
  </div>
</div>
</div>
@endsection
