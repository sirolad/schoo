<?php

namespace Schoo\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
     /**
     * Search for projects from the db
     * @return view the search view (search.blade.php);
     */
    public function search()
    {
        $searchInput = Input::get('search');

        if ($searchInput) {
            $courses = DB::table('courses')->join('users', 'users.id', '=', 'courses.user_id');

            $results = $courses->where('course', 'ILIKE', '%'.$searchInput.'%')
                                 ->orWhere('section', 'ILIKE', '%'.$searchInput.'%')
                                 ->orWhere('description', 'ILIKE', '%'.$searchInput.'%')
                                 ->orWhere('users.username', 'ILIKE', '%'.$searchInput.'%')
                                 ->get();
        } else {
            $results = [];
        }

        return view('courses.search')->with('courses', $results);
    }
}
