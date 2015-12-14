<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> Schoo</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Courses
            <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/computer-science">Computer Science</a></li>
            <li><a href="/software-development">Software Development</a></li>
            <li><a href="/personal-development">Personal Development</a></li>
            <li><a href="/languages">Languages</a></li>
            <li><a href="/general-knowledge">General Knowlegde</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="search" class="form-control col-md-8" placeholder="I want to learn about...">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
        <div class="dropdown">
          <a class="btn btn-primary dropdown-toggle dec" type="button" data-toggle="dropdown"><img class="avatar1" src="{{ Auth::user()->getAvatar() }}" >
              {{ Auth::user()->username }}
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/courses"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
            <li><a href="/profile"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Account Settings</a></li>
            <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Log out</a></li>
          </ul>
        </div>
        @else
        <li><a href="/login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Log in </a></li>
        <li><a href="/signup"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register</a></li>
        @endif
      </ul>
    </div>
  </div>
</div>