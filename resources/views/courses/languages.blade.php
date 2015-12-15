@extends('layouts.master')
@section('title','Languages')

@section('content')
<div class="jumbotron move2">
    <div class="container">
    <h1>Languages</h1>
    </div>
</div>
<div class="container" style="min-height: 180px">
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Languages</li>
    </ul>
 @include('layouts.views')
</div>
@endsection