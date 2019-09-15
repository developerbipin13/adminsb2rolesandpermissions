<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use App\User;
use Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $existingUser = User::where('google_id',$user->getId())->first();
            if (!empty($existingUser)) {
                Auth::loginUsingId($existingUser->id);
                return redirect()->route('home');
            }
            else {
                $newUser = User::create([
                    'first_name'=>$user->getName(),
                    'last_name'=>$user->getName(),
                    'email'=>$user->getEmail(),
                    'password'=>\Hash::make($user->getId()),
                    'google_id'=>$user->getId(),
                ]);
                Auth::loginUsingId($newUser->id);
                return redirect()->route('home');
            }
        } catch (Exception $e) {

            return redirect('/login')->with('error','Something Went Wrong . Please Try again Later');
        }

    }
}
