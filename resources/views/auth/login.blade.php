@extends('layouts.master')
@section('title', 'Schoo | Login')
<!--Login Form Including links for Social Authentication-->
@section('content')
<div class="container">
    <div class="row move">
      <div class="col-sm-8">
          <form class="form-horizontal" role="form" method="post" action="/login">
          <fieldset>
          <legend>Log In</legend>
          <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Username/Email</label>
              <input class="form-control" id="focusedInput2" type="text" name="email" required>
              <p class="help-block">You need to input a username</p>
            </div>
         <div class="form-group label-floating">
              <label class="control-label" for="focusedInput2">Password</label>
              <input class="form-control" id="focusedInput2" type="password" name="password" minlength="6">
              <p class="help-block">You need to input a password</p>
            </div>
        <br>
         <div class="checkbox">
          <label>
            <input type="checkbox" name="remember"> Remember Me
          </label>
        </div>
        <br>

        <div class="form-group">
          <div class="col-md-10 col-md-offset-2">
             <button type="submit" class="btn btn-raised btn-primary">Log In</button>
            <button type="reset" class="btn btn-default">Cancel</button>
          </div>
        </div>
        </fieldset>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      </div>

      <div class="col-sm-4 soc">
        <legend>Log In with Social Media</legend>
        <br>
        <br>
          <a href="/auth/twitter" class="btn btn-block btn-social btn-lg btn-twitter">
              <span class="fa fa-twitter"></span>
              Log In with Twitter
            </a>
          <a href="/auth/facebook" class="btn btn-block btn-social btn-lg btn-facebook">
              <span class="fa fa-facebook"></span>
              Log In with Facebook
            </a>
          <a href="/auth/github" class="btn btn-block btn-social btn-lg btn-github">
              <span class="fa fa-github"></span>
              Log In with github
            </a>
      </div>
    </div>
</div>
@endsection