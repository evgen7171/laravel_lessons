<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $links = (new Admin())->getTestLinks();
        return view('admin', ['links' => $links]);
    }

    public function test1()
    {
        $links = (new Admin())->getTestLinks('test1');
        $text = (new Admin())->Test1();
        return view('admin', ['links' => $links, 'text' => $text]);
    }

    public function test2()
    {
        $links = (new Admin())->getTestLinks('test2');
        $text = (new Admin())->Test2();
        return view('admin', ['links' => $links, 'text' => $text]);
    }

}
