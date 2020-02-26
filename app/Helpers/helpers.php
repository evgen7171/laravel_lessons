<?php

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
