@extends('layouts.master')
@section('title','Software Development')
<!-- View for Software Development Courses only-->
@section('content')
<div class="jumbotron move2">
    <div class="container">
    <h1>Software Development</h1>
    </div>
</div>
<div class="container" style="min-height: 180px">
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Software Development</li>
    </ul>
 @include('layouts.views')
</div>
@endsection