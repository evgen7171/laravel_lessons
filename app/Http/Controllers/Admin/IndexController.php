<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function test1()
    {
        $text = (new Admin())->Test1();
        return view('admin', ['text' => $text]);
    }

    public function test2()
    {
        $text = (new Admin())->Test2();
        return view('admin', ['text' => $text]);
    }

}
