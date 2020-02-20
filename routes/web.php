<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//страница приветствия
Route::get('/', 'HomeController@home')->name('home');
//форма входа
Route::get('/login', 'LoginController@loginForm')->name('login');
Route::post('/login', 'LoginController@check')->name('login');
//выход
Route::get('/logout', 'LoginController@logout')->name('logout');

//страницы категорий новостей
Route::group([
    'prefix' => 'news'
], function () {
    //страница новостей
    Route::get('/all', 'NewsController@getAllNews')->name('news');
    //страница одной новости
    Route::get('/{id}', 'NewsController@getOneNews')
        ->where('id', '[0-9]+')
        ->name('news.one');
//    Route::get('/{id}', 'NewsController@getOneNewsIdx')
//        ->where('id', '[0-9]+')
//        ->name('news.one');

    Route::get('/categories', 'NewsController@getCategories')->name('categories');
    Route::get('/categories/{category}', 'NewsController@getCategoryNews')->name('category');

    //страница добавления новости
    Route::get('/add', 'NewsController@addForm')->name('news.add');
    Route::post('/add', 'NewsController@add')->name('news.add');
});


//страницы админа
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/admin', 'IndexController@index')->name('admin');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});

/*
todo домашка
2. Добавить в проект шаблоны согласно подготовленному дизайну.
3. Сделать шаблоны страниц авторизации и добавления новости.
Шаблон должен быть сложным, но обязательно должен содержать в себе 4 блока: блок шапки сайта, подвала, место вывода контента и область меню.

f *. Страницу добавления новости.

 */
/*
todo что хочу сделать
Сайт---
Поиск по слову
Поиск по тегу
Поиск по категории
Выдвигающейся меню
Попап об ошибке
Просмотр изображений как попап
Просмотр блока новостей
Добавление и удаление новостей
(Редактор для добавления новости)
Сохранение/открытие/удаление новостей в файле
Просмотр новостей из кэша
Динамический поиск..через vue
Парсинг новостей хабра
Добавление новостей в избранное
RBAC (
гость- может только смотреть новости,
админ - может редактировать новости и юзеров,
юзер - может редактировать новости)

//Сборка
 */
