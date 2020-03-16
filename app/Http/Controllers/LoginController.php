<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use SocialiteProviders\VKontakte\VKontakteExtendSocialite;

class LoginController extends Controller
{
    public function loginVK()
    {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('vkontakte')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }

    public function loginFB()
    {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::driver('facebook')->redirect();
//        return Socialite::with('facebook')->redirect();
    }

    public function responseFB(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('facebook')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'fb');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }

    public function loginGoogle()
    {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with('Google')->redirect();
    }

    public function responseGoogle(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('Google')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'google');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }

    public function loginGithub()
    {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::driver('github')->redirect();
    }

    public function responseGithub(UserRepository $userRepository)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver('github')->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, 'github');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}
