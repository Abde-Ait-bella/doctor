<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function login(Request $request)
    {
        $refererUrl = $request->headers->get('referer');
        $request->session()->put('refererUrl', $refererUrl);
        return Socialite::driver('google')->scopes(['phone'])->redirect();
    }

    public function callback(Request $request)
    {
        $refererUrl = $request->session()->pull('refererUrl');
        $user = Socialite::driver('google')->user();
        $existingUsers = User::where('email', $user->email)->get();
        if ($existingUsers->isNotEmpty()) {
            \Auth::login($existingUsers->first());
            return redirect('/');
        } else {
            return redirect($refererUrl)->with('error', __('User with email does not exist'));
        }
    }
}
