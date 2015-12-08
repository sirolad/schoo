@extends('layouts.master')
@section('title', 'Account Settings')

@section('custom-css')
<link rel="stylesheet" href="css/course.css">
@endsection

@section('content')
<div class="container move">
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/200" class="avatar img-circle" alt="avatar">
          <div class="form-group">
          <label for="inputFile" class="col-md-2 control-label">Avatar</label>

          <div class="col-md-10">
            <input type="text" readonly="" class="form-control" placeholder="Browse...">
            <input type="file" id="inputFile" multiple="">
          </div>
              <input type="button" class="btn btn-primary btn-raised" value="Add Image">
    </div>
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>

        <form class="form-horizontal" role="form">
        <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary btn-raised" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>
@endsection