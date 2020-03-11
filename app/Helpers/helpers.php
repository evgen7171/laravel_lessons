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
        if(!Auth::user()){
            return false;
        }
        return Auth::user()->is_admin;
    }
}
if (!function_exists('is_super_admin')) {
    function is_super_admin()
    {
        if(!Auth::user()){
            return false;
        }
        return Auth::user()->name == 'admin';
    }
}

if (!function_exists('message_to_telegram')) {
    function message_to_telegram($text)
    {
        // Токен бота и идентификатор чата
        $token = '1140241864:AAG0ONyzcgyUNc2MvkRm2RJk6XHQSYsy4Qg';
        $chat_id = '698237240';

// Отправить сообщение
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,
            'https://api.telegram.org/bot' . $token . '/sendMessage');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,
            'chat_id=' . $chat_id . '&text=' . urlencode($text));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);

// Настройки прокси, если это необходимо
        $proxy = '111.222.222.111:8080';
        $auth = 'login:password';
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $auth);

// Отправить сообщение
        $result = curl_exec($ch);
        curl_close($ch);
    }
}