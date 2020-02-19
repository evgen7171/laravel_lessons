<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * получение всех новостей из модели
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAllNews()
    {
//        $news = News::getAllNews();
//        $news = $this->objectsToArrays($news);
        $news = News::getAllNewsModel();
        return view('news/all', [
            'arr' => $news]);
    }

    /**
     * получение новости из модели
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getOneNews($id)
    {
//        $oneNews = News::getOneNews($id);
//        $oneNews = $this->objectToArray($oneNews);
        $oneNews = News::getOneNewsModel($id);
        if ($oneNews) {
            return view('news/one', [
                'news' => $oneNews
            ]);
        } else {
            redirect(route('news'));
        }
    }

    /**
     * получение новости из модели по индексу
     * @param $idx
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getOneNewsIdx($idx)
    {
        if (News::existIdx($idx)) {
            return view('news/one', [
                'news' => News::getOneNewsModelIdx($idx)
            ]);
        } else {
            return redirect(route('news'));
        }
    }

    /**
     * получение всех категорий из модели
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategories()
    {
//        $categories = News::getCategories();
//        $categories = $this->objectsToArrays($categories);
        $categories = News::getCategoriesModel();
        return view('news/categories', [
            'categories' => $categories]);
    }

    /**
     * получение категории из модели
     * @param $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCategoryNews($category)
    {
        $news = News::getCategoryNews($category);
        $news = $this->objectToArray($news);
        $category = News::getCaptionCategory($category);
        $category = $this->objectToArray($category);

//        $news = News::getCategoryNewsModel($category);
//        $category = News::getCaptionCategoryModel($category);

        dd($news);

        return view('news/all', [
            'category' => $category,
            'arr' => $news
        ]);
    }

    /**
     * форма добавления новости
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addForm()
    {
        return view('news/add');
    }

    /**
     * метод добавление новости
     */
    public function add()
    {
        $news = [
            'title' => $_POST['title'],
            'category' => $_POST['category'],
            'text' => $_POST['text']
        ];
        News::addNews($news);
    }

    /**
     * преобразование объекта в массив
     * @param $object
     * @return array
     */
    public function objectToArray($object)
    {
        $arr = [];
        foreach ($object as $key => $item) {
            $arr[$key] = $item;
        }
        return $arr;
    }

    /**
     * преобразование объектов в массивы
     * @param $objects
     * @return array
     */
    public function objectsToArrays($objects)
    {
        $arr = [];
        foreach ($objects as $object) {
            $arr[] = $this->objectToArray($object);
        }
        return $arr;
    }
}
