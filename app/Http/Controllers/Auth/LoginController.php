<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $userDataFromFacebook = Socialite::driver('facebook')->user();
        $name = $userDataFromFacebook->getName();
        $email = $userDataFromFacebook->getEmail();

        $user = User::where(['email' => $email])->first();

        if (!$user) {
            $password = 'Gfhjkm20';
            $user = User::create(
                [
                    'name' => $name,
                    'email' => $email,
                    'role_id' => 1,
                    'city' => null,
                    'sex' => 3,
                    'password' => Hash::make($password)
                ]
            );
        }

        if(Auth::login($user)) {
            return response()->redirectTo($this->redirectTo);
        }

        return response()->redirectTo('/login');

    }
}
