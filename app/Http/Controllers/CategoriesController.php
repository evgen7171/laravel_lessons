<?php

namespace App\Http\Controllers;

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

    public function categoryId($id)
    {
//        $category = News::getCategoryId($id);
//        if ($category) {
//            $news = News::getCategoryNews($category->caption);
//            return view('news.oneCategory', ['news' => $news, 'category' => $category]);
//        } else
//            return redirect(route('news.categories'));
        $news = News::getCategoryNews($category->caption);
        return view('news.oneCategory', ['news' => $news, 'category' => $category]);
    }

    /**
     * показать все категории
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories()
    {
        return view('news.categories', ['categories' => News::getCategories()]);
    }

    public function newsOne(News $news)
    {
//        $news = News::getOneNews($id);

        $category = News::getCategoryId($news->category_id);

        return view('news.one', ['category' => $category, 'news' => $news]);

//        if ($news)
//            return view('news.one', ['category' => $category, 'news' => $news]);
//        else
//            return redirect(route('news.all'));
    }

    public static function findByCaption($caption)
    {
        foreach (News::getAllNews() as $item) {
            if ($item->title == $caption) {
                return $item;
            }
        }
    }

    public function getNewsFromFile()
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    public static function getCategoriesFromFile(): array
    {
        return json_decode(Storage::disk('local')->get('categories.json'), true);
    }
}
