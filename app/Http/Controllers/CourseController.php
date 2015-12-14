<?php

namespace Schoo\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Alert;
use Validator;
use Schoo\Course;
use Schoo\Http\Requests;
use Schoo\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();

        return view('courses.index')->withCourses($courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course'      => 'required',
            'description' => 'required|min:15',
            'url'         => 'required|url',
            'section'     => 'required'
        ]);

        if($validator->fails()) {
            Alert::error('Oops','Invalid Inputs');

            return redirect('/courses');
        }

        $course = new Course;

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        return view('courses.show', compact(['course']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);

        return view('courses.edit')->withCourse($course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return [ 'status_code' => 200, 'message' => 'Course deleted successfully'];
    }

    /**
     * Get Youtube video id from url
     * @param   string url
     * @return  string
     */
    public function getVideoId($url)
    {
        $result = substr($url, 32, 11);

        return $result;
    }

    /**
     * Validate the existence of a resource video
     *
     * @param $videoID Youtube ID supplied by those posting
     * @return bool
     */
    protected function youtubeExist($videoID)
    {
        $theURL = "http://www.youtube.com/oembed?url=http://www.youtube.com/watch?v=$videoID&format=json";
        $headers = get_headers($theURL);
        return (substr($headers[0], 9, 3) !== "404") ? true : false;
    }
}
