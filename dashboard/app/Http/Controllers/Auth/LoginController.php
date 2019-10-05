<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function discordCallback()
    {

        try {

            $discordUser = Socialite::driver('discord')->user();

            $snowflake = $discordUser->id;

            $user = User::where('snowflake', $snowflake)
                ->first();

            if(!$user)
            {
                $user = new User();
                $user->snowflake = $snowflake;
                $user->username = $discordUser->name;
                $user->save();
            }

            auth()->loginUsingId($user->id);

            return redirect('/dashboard');
        } catch (InvalidStateException $exception) {
            return redirect('/');
        }

    }

    public function discordRedirect()
    {
        return Socialite::with('discord')->redirect();
    }
}
