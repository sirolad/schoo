<?php

namespace Schoo\Http\Controllers;

use Auth;
use Alert;
use Socialite;
use Schoo\User;
use Schoo\Http\Requests;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use Schoo\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Display the form for registeration.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating login.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Register a new Learner
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|alpha_dash|max:20',
            'email'    => 'required|unique:users|email|max:255',
            'password' => 'required|min:6',
        ]);

        // User::create([
        //     'username' => $request->input('username'),
        //     'email'    => $request->input('email'),
        //     'password' => bcrypt($request->input('password'))
        // ]);

        Alert::success('You have successfully signed in!');

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function getLogOut()
    {
        Auth::logout();
        Alert::success('See you again!','miss you');

        return redirect()->route('index');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $authStatus = Auth::attempt($request->only(['email', 'password']), $request->has('remember'));
        if (!$authStatus) {
            return redirect()->back()->with('warning', 'Invalid Email or Password');
        }

        return redirect()->route('courses.index')->with('info', 'You are now signed in');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
