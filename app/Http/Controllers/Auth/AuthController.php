<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator, Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogin() {
    	return view('auth.login');
    }

    public function postLogin(LoginRequest $request) {
    	$remember = false;
    	if(isset($request->remember) && $request->remember == 1) $remember = true;
    	$login = array(
    	 		'email' 	=> $request->email,
    	 		'password' 	=> $request->password
    	 );
    	 
    	 if(Auth::attempt($login, $remember)) {
    	 	return redirect()->route('home');
    	 } else {
    	 	return redirect()->back()->withErrors(['Thông tin đăng nhập không chính xác!']);
    	 }
    }

    public function getLogout() {
    	Auth::logout();
    	return redirect('/');
    }

    public function getRegister() {
    	 return view('auth.register');
    }

    public function postRegister() {
    	 
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
    *
    *    handle the data returned from social site so once users are authenticated to 
    *   social site and returns to our site, we need to log them in, to do so, we need
    *   to store user credentials to our User table, we will use user model to accomplish this task.
    *
    *   @param $provider: name of social that you want login 
    */

    public function redirectToProvider($provider) 
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
    *   handle data returned from social and save them to database
    *   
    *   @param $provider: name of social that you want login 
    */
    public function handleProviderCallback($provider) 
    {
        $user = Socialite::provider($provider)->user();
        //Storing data to User table and logging them in
        $data = [
            'display_name' => $user->getName(),
            'email' => $user->getEmail()
        ];

        Auth::login(User::firstOrCreate($data));

        //after login redirecting to home page
        return redirect($this->redirectPath());
    }
}
