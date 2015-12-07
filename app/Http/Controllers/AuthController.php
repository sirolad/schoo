<?php

namespace Schoo\Http\Controllers;

use Auth;
use Alert;
use Redirect;
use Socialite;
use Schoo\User;
use Schoo\Http\Requests;
use Illuminate\Http\Request;
use Schoo\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/courses';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);

        $this->middleware('oauthUser', ['only' => ['getOauth']]);
    }

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

        $user = User::create([
            'username' => $request->input('username'),
            'email'    => $request->input('email'),
            'password' => md5($request->input('password'))
        ]);

        Auth::login($user);
        Alert::success('You have successfully signed in!');

        return redirect()->to('/courses');
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
        $field = filter_var($request['email'], FILTER_VALIDATE_EMAIL) ? "email" : "username";
        $user = User::where($field, $request['email'])->first();
        if (! is_null($user)) {
            if ($user->password == md5($request['password'])) {
                $request->has('remember') ? Auth::login($user, true) : Auth::login($user);
                Alert::success('Welcome Back', $user->username);

                return redirect('/courses');
            }
        }
        Alert::error('Oops','Login Failed');

        return redirect()->back();
    }

    /**
     *  Redirects to provider authentication page
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     *  Logs in user with their social media credentials
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/' . $provider);
        }
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::loginUsingId($authUser->id, true);
        Alert::success('You will learn a lot', 'Welcome!');

        return Redirect::to($this->redirectTo);
    }
    /**
     * checks if user exists then creates new if user does not exist
     */
    private function findOrCreateUser($theUser, $provider)
    {
      $authUser = User::where('uid', $theUser->id)->first();
      $username = isset($theUser->user['first_name']) ? $theUser->user['first_name'] : $theUser->nickname;
      if ($authUser) {
          return $authUser;
      }
      if (User::where('username', $theUser->nickname)->first()) {
          $user = factory(User::class)->make([
              'username'    => $username,
              'email'       => $theUser->email,
              'provider'    => $provider,
              'uid'         => $theUser->id,
              'avatar_url'  => $theUser->avatar,
          ]);
      }
      return User::create([
          'username'   => $username,
          'email'      => $theUser->email,
          'provider'   => $provider,
          'uid'        => $theUser->id,
          'avatar_url' => $theUser->avatar,
      ]);
    }
}
