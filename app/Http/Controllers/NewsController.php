<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * показать все новости
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function news()
    {
        $news = News::query()->paginate(6);
        return view('news.all', ['news' => $news]);
    }

    public function newsOne(News $news)
    {
        $category = $news->belongsTo('App\Models\Categories', 'category_id')->get()[0];
        return view('news.one', ['category' => $category, 'news' => $news]);
    }

    public function getNewsFromFile()
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }
}
