<?php

namespace App\Models;

use App\Providers\CustomServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    /**
     * метод получения всех новостей
     * @return \Illuminate\Support\Collection
     */
//    public static function getAllNews()
//    {
//        return self::all();
////        return DB::table('news')->get();
//    }

    public static function getAllNewsTitles()
    {
        $arr = [];
        $data = DB::table('news')->get('title')->toArray();
        foreach ($data as $item) {
            $arr[] = $item->title;
        }
        return $arr;
    }

    public static function getCategoriesCaptions()
    {
        $arr = [];
        $data = DB::table('categories')->get('caption')->toArray();
        foreach ($data as $item) {
            $arr[] = $item->caption;
        }
        return $arr;
    }

//    public static function getOneNews(News $news)
//    {
////        $news = DB::table('news')->find($id);
////        if (!empty($news)) {
////            return view('news.one', ['news' => $news]);
////        } else {
////            return redirect(route('news.all'));
////        }
//
//        return view('news.one', ['news' => $news]);
//
////        return DB::table('news')->where('id', $id)->get()[0];
//    }

    public static function getCategoryId($id)
    {
        return DB::table('categories')->where('id', $id)->get()[0];
    }

    /**
     * метод получения всех категорий новостей
     * @return \Illuminate\Support\Collection
     */
    public static function getCategories()
    {
        return DB::table('categories')->get();
    }

    /**
     * метод получения названий категорий
     * @param $categoryName
     * @return mixed
     */
    public static function getCaptionCategory($categoryName)
    {
        return DB::table('news_categories')
            ->where('name', $categoryName)
            ->get('caption');
    }

    /**
     * метод получения новостей по категории
     * @param $category
     * @return \Illuminate\Support\Collection
     */
    public static function getCategoryNews($category)
    {
        return DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->where('categories.caption', '=', $category)
            ->get();
    }

    /**
     * метод добавления новости
     * @array $news - [title, category, text] - данные новости
     */
    public static function addNews($news)
    {
        DB::table('news')->insert(
            [
                'title' => $news['title'],
                'text' => $news['text'],
                'category_id' => $news['category_id'],
                'isPrivate' => $news['isPrivate']
            ]
        );
    }

    /**
     * метод удаления новости
     * @int $id - данные новости
     */
    public static function removeNews($id)
    {
        DB::table('news')->delete($id);
    }

    public static function updateNews($news)
    {
        DB::table('news')->where('id', $news['id'])
            ->update([
                'title' => $news['title'],
                'text' => $news['text'],
                'category_id' => $news['category_id'],
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    public static function updateCategory($category)
    {
        DB::table('news')->where('id', $category['id'])
            ->update([
                'name' => $category['name'],
                'caption' => $category['caption'],
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    /**
     * метод удаления новости
     * @int $id - данные новости
     */
    public static function removeCategory($id)
    {
        DB::table('categories')->delete($id);
    }

    /**
     * метод создания категории в базе данных
     */
    public static function addCategory($category)
    {
        DB::table('categories')->insert(
            [
                'name' => CustomServiceProvider::translitText($category),
                'caption' => $category
            ]
        );
        return DB::table('news_category')->where('caption', $category)->get('id');
    }

}
