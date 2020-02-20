<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function auth_google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function auth_google_callback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser){
                if(!$finduser->google_id)
                {
                    $updateData = [
                        'google_id' => $user->id,
                    ];
                    User::where('email', $user->email)->update($updateData);
                }
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password'=>bcrypt(Str::random(6)),
                ]);
                Auth::login($newUser);
                return Redirect::route('home');
            }
        } catch (Exception $e) {
            return redirect('/auth/google');
        }
    }

    public function auth_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function auth_facebook_callback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser){
                if(!$finduser->facebook_id)
                {
                    $updateData = [
                        'facebook_id' => $user->id,
                    ];
                    User::where('email', $user->email)->update($updateData);
                }
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password'=>bcrypt(Str::random(6)),
                ]);
                Auth::login($newUser);
                return Redirect::route('home');
            }
        } catch (Exception $e) {
            return redirect('/auth/facebook');
        }
    }

    public function auth_twitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function auth_twitter_callback()
    {
        try {
            $user = Socialite::driver('twitter')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser){
                if(!$finduser->twitter_id)
                {
                    $updateData = [
                        'twitter_id' => $user->id,
                    ];
                    User::where('email', $user->email)->update($updateData);
                }
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'twitter_id'=> $user->id,
                    'password'=>bcrypt(Str::random(6)),
                ]);
                Auth::login($newUser);
                return Redirect::route('home');
            }
        } catch (Exception $e) {
            return redirect('/auth/twitter');
        }
    }

    public function auth_github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function auth_github_callback()
    {
        try {
            $user = Socialite::driver('github')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser){
                if(!$finduser->github_id)
                {
                    $updateData = [
                        'github_id' => $user->id,
                    ];
                    User::where('email', $user->email)->update($updateData);
                }
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'password'=>bcrypt(Str::random(6)),
                ]);
                Auth::login($newUser);
                return Redirect::route('home');
            }
        } catch (Exception $e) {
            return redirect('/auth/github');
        }
    }

    public function auth_linkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function auth_linkedin_callback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser){
                if(!$finduser->linkedin_id)
                {
                    $updateData = [
                        'linkedin_id' => $user->id,
                    ];
                    User::where('email', $user->email)->update($updateData);
                }
                Auth::login($finduser);
                return redirect('/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'linkedin_id'=> $user->id,
                    'password'=>bcrypt(Str::random(6)),
                ]);
                Auth::login($newUser);
                return Redirect::route('home');
            }
        } catch (Exception $e) {
            return redirect('/auth/linkedin');
        }
    }
}
