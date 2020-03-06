<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * показать все категории
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function categories()
    {
        $categories = Categories::query()->paginate(6);
        return view('news.categories', ['categories' => $categories]);
    }

    public function categoryId($id)
    {
        $category = new Categories;
        $category->id = $id;
        $news = $category->hasMany('App\Models\News', 'category_id')->get();
        return view('news.oneCategory', ['news' => $news, 'category' => $category]);
    }

    public static function getCategoriesFromFile(): array
    {
        return json_decode(Storage::disk('local')->get('categories.json'), true);
    }
}
