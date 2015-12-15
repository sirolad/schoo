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
 @include('layouts.views')
</div>
@endsection