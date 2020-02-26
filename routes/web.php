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
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/all', 'NewsController@categories')->name('categories');
    Route::get('/categories/{id}', 'NewsController@categoryId')->name('categoryId');
    Route::get('/add', 'NewsController@addForm')->name('news.add');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::match(['post', 'get'], '/addNews', 'IndexController@addNews')->name('addNews');
    Route::get('/addNews2', 'IndexController@addNews2')->name('addNews2');
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');
});


Auth::routes();

