@extends('layouts.master')
@section('title','General Knowledge')

@section('content')
<div class="jumbotron move2">
    <div class="container">
    <h1>General Knowledge</h1>
    </div>
</div>
<div class="container" style="min-height: 180px">
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">General Knowledge</li>
    </ul>
 @include('layouts.views')
</div>
@endsection