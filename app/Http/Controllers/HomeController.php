<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\CustomServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $images = CustomServiceProvider::getStoragePathFileNames('images/home');

        $images = [];
        $path = 'images/home';
        foreach (scandir(public_path($path)) as $item) {
            if ($item == '.' or $item == '..') continue;
            $images[] = $path .'/'. $item;
        }

        return view('home', ['images' => $images]);
    }

    public function vue()
    {
        return view('vue');
    }

    public function telegram()
    {
        message_to_telegram('News Block');
        return redirect()->route('home');
    }


}
