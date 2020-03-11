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
<<<<<<< HEAD
//        $images = CustomServiceProvider::getStoragePathFileNames('images/home');

        $images = [];
        $path = 'images/home';
        foreach (scandir(public_path($path)) as $item) {
            if ($item == '.' or $item == '..') continue;
            $images[] = $path .'/'. $item;
        }

=======
<<<<<<< HEAD
=======
//        dump(Auth::guest());
<<<<<<< HEAD
>>>>>>> master
        $images = CustomServiceProvider::getStoragePathFileNames('images/home');
=======
        $images = CustomServiceProvider::getPathFileNames(storage_path('images/home'));
>>>>>>> master
>>>>>>> 0147a26da9ff9554c65dbc8412676ff47c4046a5
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
