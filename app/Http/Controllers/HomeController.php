<?php

namespace Schoo\Http\Controllers;

use Schoo\Course;

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
     * View for computer science courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function getComputer()
    {
        $courses = Course::where('section', 'Computer Science')->paginate(20);

        return view('courses.computer')->withCourses($courses);
    }

    /**
     * View for languages courses.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function getLanguages()
    {
        $courses = Course::where('section', 'Languages')->paginate(20);

        return view('courses.languages')->withCourses($courses);
    }

    /**
     * View for General Knowledge courses.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getGeneral()
    {
        $courses = Course::where('section', 'General Knowledge')->paginate(20);

        return view('courses.general')->withCourses($courses);
    }

    /**
     * View for software development courses.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getSoftware()
    {
        $courses = Course::where('section', 'Software Development')->paginate(20);

        return view('courses.software')->withCourses($courses);
    }

    /**
     * View for personal development courses.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getPersonal()
    {
        $courses = Course::where('section', 'Personal Development')->paginate(20);

        return view('courses.personal')->withCourses($courses);
    }
}
