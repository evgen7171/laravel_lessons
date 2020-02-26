<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        return view('news.all', ['news' => News::$news]);
    }

    public function categoryId($id)
    {
        $news = [];

        foreach (News::$categories as $item) {
            if ($item['name'] == $id) $id = $item['id'];
        }

        if (array_key_exists($id, News::$categories)) {
            $category = News::$categories[$id]['caption'];
            foreach (News::$news as $item) {
                if ($item['category_id'] == $id)
                    $news[] = $item;
            }
            return view('news.oneCategory', ['news' => $news, 'category' => $category]);
        } else
            return redirect(route('news.categories'));

    }

    public function categories()
    {
        return view('news.categories', ['categories' => News::$categories]);
    }

    public function newsOne($id)
    {
        if (array_key_exists($id, News::$news))
            return view('news.one', ['news' => News::$news[$id]]);
        else
            return redirect(route('news.all'));

    }

}
