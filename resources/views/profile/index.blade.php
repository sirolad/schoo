@extends('layouts.master') @section('title', 'Account Settings') @section('custom-css')
<link rel="stylesheet" href="css/course.css"> @endsection @section('content')
<div class="container move">
    <h1>Account Settings</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
            <form  method="POST" action="/profile/avatar" enctype="multipart/form-data">
                <img src="{{ Auth::user()->avatar_url }}" class="avatar2 img-circle" alt="avatar">
                <div class="form-group">
                    <label for="inputFile" class="col-md-2 control-label">Avatar</label>
                    <div class="col-md-10">
                        <input type="text" readonly="" class="form-control" placeholder="Browse...">
                        <input type="file" id="inputFile" multiple="" name="avatar">
                    </div>
                    <input type="submit" class="btn btn-primary btn-raised" value="Add Image">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Personal info</h3>
            <form class="form-horizontal" role="form" method="POST" action="/profile">
                <div class="form-group">
                    <label class="col-md-3 control-label">Username:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="{{ Auth::user()->username }}" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ Auth::user()->name }}" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ Auth::user()->email }}" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary btn-raised" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</div>
<hr> @endsection
