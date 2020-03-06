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
//        dump(Auth::guest());
<<<<<<< HEAD
        $images = CustomServiceProvider::getStoragePathFileNames('images/home');
=======
        $images = CustomServiceProvider::getPathFileNames(storage_path('images/home'));
>>>>>>> master
        return view('home', ['images' => $images]);
    }
}
