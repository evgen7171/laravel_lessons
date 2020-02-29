<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin/index');
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

    public function addNews2()
    {
        return view('admin.addNews2', ['categories' => array_column(News::$categories, 'caption')]);

    }

    public function addNews(Request $request)
    {
        // todo метод добавления новости
//        session()->put()
//        session()->get()

        if ($request->isMethod('post')) {
            $request->flash();
            return redirect()->route('admin.addNews');
        }

        return view('admin.addNews', ['categories' => News::$categories]);
    }

    public function downloadData(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();
            dd($request);
//            return redirect()->route('admin.addNews');
        }
        $news = array_column(News::$news, 'title');
        return view('admin.download', ['news'=>$news]);

//        $content = view('admin.test1')->render();
//        return response($content)
//            ->header('Content-type', 'application/text')
//            ->header('Content-type', mb_strlen($content))
//            ->header('Content-Disposition', 'attachment; filname = downloaded.txt');

    }
}
