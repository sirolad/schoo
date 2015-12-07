@extends('layouts.master')
@section('title', 'Dashboard')

@section('custom-css')
<link rel="stylesheet" href="css/course.css">
@endsection

@section('content')
<section class="move2">
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <div class="profile">
            <img class="img-circle" width="160px" height="160px" src="http://res.cloudinary.com/dqmv6brld/image/upload/v1449403069/pix_qlwbr7.jpg">
            <h3>Student One</h3>
            <hr>
        </div>

            <ul class="sidebar-nav move3">
                <li>
                    <a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile Settings</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Courses</a>
                </li>
                <li>
                    <a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Modules</a>
                </li>
                <li>
                    <a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-info btn-raised" id="menu-toggle"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
                        <h1>Shared Courses</h1>
                        <p>This are the courses you have upload module(s) for.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
</section>
@endsection