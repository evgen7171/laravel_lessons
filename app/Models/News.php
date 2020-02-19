<?php

namespace App\Models;

use App\Http\Controllers\LoginController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Инопланетяне среди нас',
            'categories' => 1,
            'text' => 'В Саратове родился инопланетянин!',
            'isPrivate' => true
        ],
        2 => [
            'id' => 2,
            'title' => 'О футболе',
            'categories' => 2,
            'text' => 'В эту субботу состоится матч по футболу между командами "Крылья советов" и "Спутник"',
            'isPrivate' => false
        ],
        3 => [
            'id' => 3,
            'title' => 'О погоде',
            'categories' => 2,
            'text' => 'А будет ли зима вообще? Синоптики прибегают к профессиональным гадалкам!',
            'isPrivate' => false
        ],
        4 => [
            'id' => 4,
            'title' => 'О финансах',
            'categories' => 3,
            'text' => 'Курс евро/доллар = 1,08',
            'isPrivate' => true
        ],
        5 => [
            'id' => 4,
            'title' => 'О финансах',
            'categories' => 3,
            'text' => 'Курс фунт стерлингов/йена = 142,82',
            'isPrivate' => true
        ],
        5 => [
            'id' => 5,
            'title' => 'Коронавирус. За или против?',
            'categories' => 4,
            'text' => 'Новый вирус не страшнее обычной простуды. Редакция против некачественных товаров, но и против некачественного вируса.',
            'isPrivate' => false
        ],
    ];
    private static $categories = [
        0 => [
            'id' => 1,
            'name' => 'yellow',
            'caption' => 'желтая пресса'
        ],
        1 => [
            'id' => 1,
            'name' => 'sport',
            'caption' => 'спорт'
        ],
        2 => [
            'id' => 2,
            'name' => 'weather',
            'caption' => 'погода'
        ],
        3 => [
            'id' => 3,
            'name' => 'currency',
            'caption' => 'валюта'
        ],
        4 => [
            'id' => 4,
            'name' => 'health',
            'caption' => 'здоровье'
        ]
    ];

    public static function existIdx($idx)
    {
        return array_key_exists($idx, News::$news);
    }

    /**
     * метод получения всех новостей из модели
     * @return array
     */
    public static function getAllNewsModel()
    {
        return self::$news;
    }

    /**
     * метод получения всех новостей
     * @return \Illuminate\Support\Collection
     */
    public static function getAllNews()
    {
        return DB::table('news')->get();
    }

    /**
     * метод получения одной новости
     * @param $id - id новости
     * @return mixed
     */
    public static function getOneNewsModel($id)
    {
        return self::$news[array_search($id, array_column(self::$news, 'id'))];
    }

    public static function getOneNews($id)
    {
        return DB::table('news')->where('id', $id)->get()[0];
    }

    public static function getOneNewsModelIdx($idx)
    {
        return self::$news[$idx];
    }

    /**
     * метод получения всех категорий новостей из модели
     * @return array
     */
    public static function getCategoriesModel()
    {
        return self::$categories;
    }

    /**
     * метод получения всех категорий новостей
     * @return \Illuminate\Support\Collection
     */
    public static function getCategories()
    {
        $categories = DB::table('news_categories')->get();
        return $categories;
    }

    /**
     * метод получения названий категорий из модели
     * @param $categoryName
     * @return mixed
     */
    public static function getCaptionCategoryModel($categoryName)
    {
        $categories = self::$categories;
        return array_column($categories, 'caption')
        [array_search(
            $categoryName, array_column($categories, 'name')
        )];
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
     * метод получения новостей по категории из модели
     * @param $category
     * @return array
     */
    public static function getCategoryNewsModel($category)
    {
        $categories = $categories = self::$categories;
        $category_id = $categories
        [array_search(
            $category, array_column($categories, 'name')
        )]['id'];

        foreach (self::$news as $news) {
            if (in_array($category_id, $news['categories'])) {
                return $news;
            }
        }
    }

    /**
     * метод получения новостей по категории
     * @param $category
     * @return \Illuminate\Support\Collection
     */
    public static function getCategoryNews($category)
    {
        return DB::table('news')
            ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
            ->where('name', $category)
            ->get()[0];
    }

    /**
     * метод добавления новости
     * @array $news - [title, category, text] - данные новости
     */
    public static function addNews($news)
    {
        if (!DB::connection('mysql')) {
            dump('ошибка подключения базы данных');
            return null;
        }
        $category = DB::table('news_categories')->where('caption', $news['category'])->get();
        $isAdmin = !LoginController::isAdmin();
        if (!count($category) and $isAdmin) {
            dd('нет такой категории');
        } elseif (!count($category) and !$isAdmin) {
            $news['category_id'] = self::createCategory($news['category']);
            self::createNews($news);
        } else {
            self::createNews($news);
        }
    }

    /**
     * метод создания категории в базе данных
     */
    public static function createCategory($category)
    {
        DB::table('news_category')->insert(
            [
                'name' => self::translit($category),
                'caption' => $category
            ]
        );
        return DB::table('news_category')->where('caption', $category)->get('id');
    }

    /**
     * метод создания новости в базе данных
     */
    public static function createNews($news)
    {
        DB::table('news_category')->insert(
            [
                'title' => $news['title'],
                'text' => $news['text'],
                'category_id' => $news['category_id'],
                'isPrivate' => $news['isPrivate']
            ]
        );
    }

    /**
     * метод получения id последней новости
     * @return mixed
     */
    public static function getLastIdModel()
    {
        $news = self::$news;
        return array_column($news, 'id')
        [count(array_column($news, 'id')) - 1];
    }

    /**
     * транслиитерация
     * @param $string
     * @return string
     */
    public static function translit($string)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
}
