<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
<<<<<<< HEAD
        //
    }

=======
        Blade::directive('errmes', function () {
            return "<p class='container' style=\"color:red;\">страница в разработке!<p>";
        });

    }
>>>>>>> master

    /**
     * случаное булевое
     * @return bool
     */
    public static function randBoolean()
    {
        $rand = rand(1, 100) / 100;
        return (bool)round($rand * $rand * $rand);
    }

    /**
     * получение всех полных имен файлов в папке
     * @param $path
     */
<<<<<<< HEAD
    public static function getStoragePathFileNames($path)
    {
        $arr = [];
        $dir = scandir(public_path('storage/' . $path));
=======
    public static function getPathFileNames($path)
    {
        $arr = [];
        $dir = scandir($path);
>>>>>>> master
        foreach ($dir as $item) {
            if ($item == '.' or $item == '..') {
                continue;
            }
<<<<<<< HEAD
            $arr[] = 'storage/' . $path . '/' . $item;
=======
            $arr[] =  $item;
>>>>>>> master
        }
        return $arr;
    }

    /**
     * транслитерация
     * @param $string
     * @return string
     */
    public static function translitText($string)
    {
        $converter = array(
            ' ' => '_',
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
        $exceptChars = ["!", "?", "@", ",", '.', '\'', '\"', '\`'];
        $string = str_replace($exceptChars, "", $string);
        return strtr($string, $converter);
    }
}
