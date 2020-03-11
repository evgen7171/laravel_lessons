<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Console\Input\Input;

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
        //view()->share('message','тестовое сообщение')
    }


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
    public static function getStoragePathFileNames($path)
    {
        $path = self::copyInStorage();
        dd($path);
        //////////////////
        $arr = [];
        $dir = scandir(public_path('storage/' . $path));
        foreach ($dir as $item) {
            if ($item == '.' or $item == '..') {
                continue;
            }
            $arr[] = 'storage/' . $path . '/' . $item;
        }
        return $arr;
    }

    /**
     * копирование папки storage
     */
    public static function copyInStorage()
    {
        $path_from = storage_path('app\public');
        $path_to = 'images';
        self::directoryIter($path_from, $path_to);
    }

    public static function directoryIter(string $path_from, string $path_to, $str = '')
    {
        foreach (new \DirectoryIterator($path_from) as $fileInfo) {
            if ($fileInfo->isDot() or $fileInfo->getFilename() == '.gitignore') continue;
            if ($fileInfo->isDir()) {
                $str .= $fileInfo->getFilename().'\\';
                self::directoryIter($path_from . '\\' . $fileInfo, $path_to, $str);
            }
            File::put(public_path($str . $fileInfo->getFilename()),
                File::get($fileInfo->getPathname()));
        }
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

    public static function getImageUrls($folder)
    {
        $arr = [];
        $imagesPath = 'images/' . $folder;
//        $dir = scandir(public_path('storage/' . $imagesPath));
        $dir = scandir(public_path( $imagesPath));
        foreach ($dir as $item) {
            if ($item == '.' or $item == '..') {
                continue;
            }
            $arr[] = 'storage/' . $imagesPath . '/' . $item;
        }
        if (!count($arr)) {
            return false;
        }
        return $arr;
    }
}
