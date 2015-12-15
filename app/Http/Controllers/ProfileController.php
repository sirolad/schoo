<?php

namespace Schoo\Http\Controllers;

use Auth;
use Alert;
use Redirect;
use Cloudder;
use Schoo\User;
use Schoo\Http\Requests;
use Illuminate\Http\Request;
use Schoo\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $input = $request->except('_token','url');

        if (User::where('username', '=', $request->get('username'))->exists()) {
            $input = $request->except('username', '_token', 'url');
            User::find(Auth::user()->id)->updateProfile($input);
            Alert::warning('Oops', 'Username Already Exist');

            return Redirect::back();
        }

        User::find(Auth::user()->id)->updateProfile($input);
        Alert::success('Good', 'You have successfully updated your profile');

        return redirect('/courses');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $img = $request->file('avatar');

        if (isset($img)) {
            Cloudder::upload($img);
            $imgurl = Cloudder::getResult()['url'];

            User::find(Auth::user()->id)->updateAvatar($imgurl);

            Alert::success('Good','Avatar updated successfully');

            return redirect('/courses');
        }
        Alert::warning('Oops', 'You need to select a file!');

        return Redirect::back();
    }
}
