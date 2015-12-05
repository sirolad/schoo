@extends('layouts.master')
@section('title', 'Schoo | Register')

@section('content')
<div class="container">
    <div class="row move">
      <div class="col-sm-8">
          <form class="form-horizontal" role="form">
          <fieldset>
          <legend>Sign Up</legend>
          <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Username</label>
              <input class="form-control" id="focusedInput2" type="text">
              <p class="help-block">You need to input a username</p>
            </div>
          <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Email</label>
              <input class="form-control" id="focusedInput2" type="email">
              <p class="help-block">You need to input an email</p>
            </div>
         <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Password</label>
              <input class="form-control" id="focusedInput2" type="password">
              <p class="help-block">You need to input a password</p>
            </div>
          <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-raised btn-primary">Sign Up</button>
          </div>
        </div>
        </fieldset>
        </form>
      </div>
      <div class="col-sm-4">
        <legend>Sign Up with Social Media</legend>
        <br>
        <br>
          <a href="#" class="btn btn-block btn-social btn-lg btn-twitter">
              <span class="fa fa-twitter"></span>
              Sign in with Twitter
            </a>
          <a href="#" class="btn btn-block btn-social btn-lg btn-facebook">
              <span class="fa fa-facebook"></span>
              Sign in with Facebook
            </a>
          <a href="#" class="btn btn-block btn-social btn-lg btn-github">
              <span class="fa fa-github"></span>
              Sign in with github
            </a>
      </div>
    </div>
</div>
@endsection