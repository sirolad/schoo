@if(!$courses)
      <div>
          <h4 style="text-align: center; margin-top: 20px">No results found for your query.</h4>
      </div>
      @endif

      <div class="row previews">
    @if($courses)
        @foreach($courses as $course)
            <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="thumbnail">
                <a href="/courses/{{ $course->id }}" class="post-image-link">
                    <p>
                        <img src="http://i1.ytimg.com/vi/{{ $course->video_id }}/hqdefault.jpg" class="img-responsive img" alt="Course Image">
                    </p>
                </a>
                <div class="caption">
                    <h3>{{ $course->course }}</h3>
                    <p>{{ $course->section }}</p>
                    <a href="/courses/{{ $course->id }}" class="btn btn-primary btn-raised">Start Course</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
  </div>