<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('shortText')) {
    function shortText($text, $count = 20)
    {
        return mb_substr($text, 0, $count);
    }
}
/**
 * функция для "хлебных крошек"
 * @param $route - для проверки роута
 * @param $text - для проверки роута
 * @param $link - для проверки роута
 * @return - код html (ссылка или текст)
 */
if (!function_exists('breadLink')) {
    function breadLink($text, $link = '#')
    {
        return $link == '#' ?
            '<li class="breadcrumb-item active" aria-current="page">' . $text . '</li>' :
            '<li class="breadcrumb-item"><a href=' . $link . '>' . $text . '</a></li>';
    }
}
/**
 * функция для "тексто-ссылок"
 * @param $route - для проверки роута
 * @param $text - для проверки роута
 * @param $link - для проверки роута
 * @return - код html (ссылка или текст)
 */
if (!function_exists('textLink')) {
    function textLink($text, $link = '#')
    {
        return $link == '#' ?
            '<span>' . $text . '</span>' :
            '<a href="' . $link . '">' . $text . '</a>';
    }
}
if (!function_exists('showErrors')) {
    function showErrors($errors, string $field)
    {
        if ($errors->has($field)) {
            $html = '<div class="alert alert-danger" role="alert">';
            foreach ($errors->get($field) as $error) {
                $html .= $error;
            }
            $html .= '</div>';
            return $html;
        }
//        @if ($errors->has($field))
//            <div class="alert alert-danger" role="alert">
//                @foreach($errors->get($field) as $error)
//                    {{$error}}
//                @endforeach
//            </div>
//            @endif
    }
}
if (!function_exists('toArrayValues')) {
    function toArrayValues(Array $array, string $key = '')
    {
        $arr = [];
        if ($key == '') {
            $key = array_keys($array[0])[0];
        }
        foreach ($array as $item) {
            $arr[] = $item[$key];
        }
        return $arr;
    }
}
if (!function_exists('is_admin')) {
    function is_admin()
    {
        if (!Auth::user()) {
            return false;
        }
        return Auth::user()->is_admin;
    }
}
if (!function_exists('is_super_admin')) {
    function is_super_admin()
    {
        if (!Auth::user()) {
            return false;
        }
        return Auth::user()->name == 'admin';
    }
}

if (!function_exists('find_in_array')) {
    function find_in_array($elem, $array)
    {
        return is_int(array_search($elem, $array));
    }
}

