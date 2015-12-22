@extends('layouts.master')
@section('title', 'Schoo | Register')
<!--Registration Form including links for Social Authentication-->
@section('content')
<div class="container">
    <div class="row move">
      <div class="col-sm-8">
          <form class="form-horizontal" role="form" method="post" action="/signup">
          <fieldset>
          <legend>Sign Up</legend>
          <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Username</label>
              <input class="form-control" id="focusedInput2" type="text" name="username" required>
              <p class="help-block">You need to input a username</p>
            </div>
          <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Email</label>
              <input class="form-control" id="focusedInput2" type="email" name="email">
              <p class="help-block">You need to input an email</p>
            </div>
         <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Password</label>
              <input class="form-control" id="focusedInput2" type="password" name="password" minlength="6">
              <p class="help-block">Minimum of 6 characters</p>
            </div>
          <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
            <button type="submit" class="btn btn-raised btn-primary">Sign Up</button>
            <button type="reset" class="btn btn-default">Cancel</button>
          </div>
        </div>
        </fieldset>
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      </div>
      <div class="col-sm-4 soc">
        <legend>Sign Up with Social Media</legend>
        <br>
        <br>
          <a href="/auth/twitter" class="btn btn-block btn-social btn-lg btn-twitter">
              <span class="fa fa-twitter"></span>
              Sign Up with Twitter
            </a>
          <a href="/auth/facebook" class="btn btn-block btn-social btn-lg btn-facebook">
              <span class="fa fa-facebook"></span>
              Sign Up with Facebook
            </a>
          <a href="/auth/github" class="btn btn-block btn-social btn-lg btn-github">
              <span class="fa fa-github"></span>
              Sign Up with github
            </a>
      </div>
    </div>
</div>
@endsection