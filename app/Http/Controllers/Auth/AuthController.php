<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Socialite;
use Auth;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
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
        $User =new User([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'password_confirmation' => bcrypt($data['password_confirmation'])

        ]);

        $User->save();


        return $User;
    }
    public function loginPath()
    {
        return route('login');
    }

    public function redirectPath()
    {
        return route('dashboard');
    }

   /* public function redirectToProvider()
    {

        return Socialite::driver('facebook')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socalite::driver('facebook')->user();
        $data = ['name'=>$user->name, 'email'=>$user->email, 'password'=>$user->token];
        $userDB = User::where('email',$user->email)->first();

        if(!is_null($userDB))
        {
            Auth::login($userDB);
        }
        else{
            Auth::login($this->create($data));
        }

        return redirect('/');
    }*/
}
