<?php

namespace Schoo\Http\Controllers;

use Alert;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Redirect;
use Schoo\Course;
use Schoo\User;
use Validator;

class CourseController extends Controller
{
    /**
     * handles authenticate middleware.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show','getAllCourses']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->personal()->paginate(20);

        return view('courses.index')->withCourses($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course'      => 'required',
            'description' => 'required|min:15',
            'url'         => 'required|url',
            'section'     => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Oops', 'Invalid Inputs');

            return redirect('/courses');
        }

        $course = new Course();

        if (Course::where('course', '=', $request->get('course'))->exists()) {
            Alert::warning('Oops', 'Course Already Exists');

            return Redirect::back();
        }

        $course->slug = Str::slug($request->input('course'));
        $checkId = $course->video_id = $this->getVideoId($request->input('url'));
        $course->user_id = Auth::user()->id;

        if ($this->youtubeExist($checkId)) {
            $values = $request->all();
            $course->fill($values)->save();

            Alert::success('Good', 'Course created successfully!');

            return redirect()->route('courses.index');
        } else {
            Alert::error('Oops', 'Only Youtube Videos are allowed!');

            return redirect()->route('courses.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = Auth::user();
        $course = Course::where('slug', $slug)->first();

        if ($course) {
            return view('courses.show')->withCourse($course)->withUser($user);
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        if ($course) {
            return view('courses.edit')->withCourse($course);
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $values = $request->all();
        $course->fill($values)->save();
        Alert::success('Good', 'Course Information updated successfully');

        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course) {
            $course->delete();

            return ['status_code' => 200, 'message' => 'Course deleted successfully'];
        }
        abort(404);
    }

    /**
     * Get Youtube video id from url.
     *
     * @param   string url
     *
     * @return string
     */
    public function getVideoId($url)
    {
        $result = substr($url, 32, 11);

        return $result;
    }

    /**
     * Validate the existence of a resource video.
     *
     * @param $videoID Youtube ID supplied by those posting
     *
     * @return bool
     */
    protected function youtubeExist($videoID)
    {
        $theURL = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$videoID&format=json";
        $headers = get_headers($theURL);

        return (substr($headers[0], 9, 3) !== '404') ? true : false;
    }

    /**
     * View to all courses for authenticated user.
     *
     * @return void
     */
    public function getAllCourses()
    {
        $courses = Course::orderBy('created_at', 'desc')->paginate(20);

        return view('courses.courses')->withCourses($courses);
    }
}
