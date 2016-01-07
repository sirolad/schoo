@extends('layouts.master')
@section('title', 'A course')
<!-- View for seeing each uploaded course-->
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

@section('content')

<div class="container move4">
<div class="text-center">
  <h3><b>{{ $course->course }}</b></h3>
  <br>
</div>

<div class="span8">
  <div class="row">
    <div class="col-sm-8">
      <div class="embed-responsive embed-responsive-16by9 frame center">
          <iframe class="embed-responsive-item" src="//www.youtube.com/embed/{{ $course->video_id }}"></iframe>
      </div>
      <br>
    </div>
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><b>About Course</b></h3>
        </div>
        <div class="panel-body">
          <br>
          <p>Description : <small>{{ $course->description }}</small></p>
          <hr>
          <p>Section : <small>{{ $course->section }}</small></p>
          <hr>
          <p>Created By : <small>{{ $course->user->username }}</small></p>
          @can('owner-can-see', $course)
          <hr>
          <div class="btn-group">
            <a href="/courses/{{ $course->id }}/edit" class="btn btn-raised btn-info">Edit</a>
            <a href="/courses/{{ $course->id }}/delete" class="btn btn-raised btn-danger" data-id="{{ $course->id }}" id="delete">delete <i class="fa fa-trash-o"></i></a>
          </div>
          @endcan
        </div>
      </div>
    </div>
    <a href="/all-courses" class="btn btn-info btn-xlarge btn-raised" style="margin-left:40px;">See All Courses <span class="glyphicon glyphicon-share-alt"></span></a>
  </div>
</div>
@endsection
