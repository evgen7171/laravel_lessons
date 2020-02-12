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
Route::get('/', 'HomeController@index')->name('home');
//страница новостей
Route::get('/news', 'NewsController@getAllNews')->name('news');
//страница одной новости
Route::get('/news/{id}', 'NewsController@getOneNews')
    ->where('id', '[0-9]+')
    ->name('newsOne');

//страницы категорий новостей
Route::group([
    'prefix' => 'news'
], function () {
    Route::get('/categories', 'NewsController@getCategories')->name('categories');
    Route::get('/categories/{category}', 'NewsController@getCategoryNews')->name('category');
});

//страница добавления новости
Route::get('/news/add', 'NewsController@addNews')->name('news.add');

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

//e *. Страницу авторизации.
//f *. Страницу добавления новости.

