<?php

namespace Schoo\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Alert;
use Schoo\Course;
use Schoo\Http\Requests;
use Schoo\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get()->take(4);
        return view('index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getComputer()
    {
        $courses = Course::where('section','Computer Science')->paginate(20);

        return view('courses.computer')->withCourses($courses);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLanguages()
    {
        $courses = Course::where('section','Languages')->paginate(20);

        return view('courses.languages')->withCourses($courses);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getGeneral()
    {
        $courses = Course::where('section','General Knowledge')->paginate(20);

        return view('courses.general')->withCourses($courses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSoftware()
    {
        $courses = Course::where('section','Software Development')->paginate(20);

        return view('courses.software')->withCourses($courses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getPersonal()
    {
        $courses = Course::where('section','Personal Development')->paginate(20);

        return view('courses.personal')->withCourses($courses);
    }
}
