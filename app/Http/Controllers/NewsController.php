<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getAllNews()
    {
        return view('news', ['arr' => (new News())->getAllNews()]);
    }

    public function getOneNews($id)
    {
        return view('oneNews', ['oneNews' => (new News())->getOneNews($id)]);
    }

    public function getCategories()
    {
        return view('categoriesNews', ['categories' => (new News())->getCategories()]);
    }

    public function getCategoryNews($category)
    {
        return view('news', ['category' => (new News)->getCaptionCategory($category),
            'arr' => (new News())->getCategoryNews($category)
        ]);
    }

    public function addNews()
    {
        return view('addnews');
//        (new News())->addNews($news);
//        return view('news', ['arr' => (new News())->getAllNews()]);
    }
}
