@extends('layouts.master')
@section('title', 'Dashboard')
<!-- View for User's dashboard-->
@section('custom-css')
<link rel="stylesheet" href="{{ asset('css/course.css') }}">
@endsection

@section('content')
<section class="move2">
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <div class="profile">
            <img class="img-circle" width="160px" height="160px" src="{{ Auth::user()->getAvatar() }}">
            <h3>{{ Auth::user()->username }}</h3>
            <hr>
        </div>

            <ul class="sidebar-nav move3">
                <li>
                    <a href="/profile"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile Settings <span class="fa arrow"></span></a>
                </li>
                <li>
                    <a href="/all-courses"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Courses</a>
                </li>
                <li>
                    <a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-info btn-raised" id="menu-toggle"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
                        <div class="row">
                            <div class="col-md-10">
                                <h1>Uploaded Courses</h1>
                            </div>
                            <div class="col-md-2">
                            <a href="#" class="btn btn-danger btn-fab pull-right" data-toggle="modal" data-target="#CourseModal"><i class="material-icons">library_add</i></a>
                            </div>
                        </div>
                        <p>These are the courses you have uploaded module(s) for.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row previews">
                @if($courses)
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-sm-6">
                        <div class="thumbnail back img-responsive">
                            <a href="/courses/{{ $course->slug }}" class="post-image-link">
                                <p>
                                    <img src="http://i1.ytimg.com/vi/{{ $course->video_id }}/hqdefault.jpg" class="img-responsive img" alt="Course Image">
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
                @if( $courses->isEmpty() )
                    <h3>No Course uploaded yet!</h3>
                @endif
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

       <div class="row text-center">
        {!! $courses->render() !!}
      </div>

    </div>
    <!-- /#wrapper -->
    <!-- Modal -->
  <div class="modal fade" id="CourseModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Course</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="post" action="{{ route('courses.store') }}">
                <fieldset>
                <div class="form-group">
                  <label for="inputName" class="col-md-2 control-label">Course Name</label>

                  <div class="col-md-10">
                    <input type="text" class="form-control" name="course" placeholder="Git" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="textArea" class="col-md-2 control-label">Course Description</label>

                  <div class="col-md-10">
                    <textarea class="form-control" rows="3" name="description" minlength="15"></textarea>
                    <span class="help-block">Minimum of 15 characters.</span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUrl" class="col-md-2 control-label">Youtube Url</label>

                  <div class="col-md-10">
                    <input type="url" class="form-control" name="url" placeholder="https://www.youtube.com/watch?v=xdX0HcaWY0A" pattern="https?://.+">
                  </div>
                </div>
                <div class="form-group">
                  <label for="select111" class="col-md-2 control-label">Section</label>

                  <div class="col-md-10">
                    <select id="select111" class="form-control" name="section">
                      <option>Computer Science</option>
                      <option>Software Development</option>
                      <option>Personal Development</option>
                      <option>Languages</option>
                      <option>General Knowledge</option>
                    </select>
                  </div>
                </div>
                </fieldset>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-raised pull-right" id="create">Create</button>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        </div>
        <div class="modal-footer">
          <div class="form-group">
              <div class="col-md-10 col-md-offset-2">
              </div>
            </div>
        </div>

      </div>

    </div>
  </div>
</section>
@endsection