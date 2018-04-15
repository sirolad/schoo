@extends('layouts.master')
@section('title','Search Results')
<!-- View for Search results-->
@section('content')
<div class="jumbotron move2">
    <div class="container">
    <h1>Search Results</h1>
    </div>
</div>
<div class="container" style="min-height: 180px">
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li class="active">Search</li>
    </ul>
    @include('layouts.views')
</div>