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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/all', 'NewsController@news')->name('news');
    Route::get('/{news}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/all', 'CategoriesController@categories')->name('categories');
    Route::get('/categories/{id}', 'CategoriesController@categoryId')->name('categoryId');
    Route::get('/add', 'NewsController@addForm')->name('news.add');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', 'NewsController@all')->name('news');
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');

    Route::match(['post', 'get'], '/addNews', 'NewsController@addNews')->name('addNews');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');
});


Auth::routes();

