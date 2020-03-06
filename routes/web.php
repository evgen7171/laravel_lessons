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
<<<<<<< HEAD
    Route::get('/all', 'NewsController@news')->name('all');
=======
<<<<<<< HEAD
    Route::get('/all', 'NewsController@news')->name('news');
>>>>>>> master
    Route::get('/{news}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/all', 'CategoriesController@categories')->name('categories');
    Route::get('/categories/{id}', 'CategoriesController@categoryId')->name('categoryId');
=======
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/categories/all', 'NewsController@categories')->name('categories');
    Route::get('/categories/{id}', 'NewsController@categoryId')->name('categoryId');
>>>>>>> master
    Route::get('/add', 'NewsController@addForm')->name('news.add');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
    Route::get('/index', 'NewsController@all')->name('news');
>>>>>>> master
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');

    Route::get('/news', 'NewsController@all')->name('news');
    Route::match(['post', 'get'], '/addNews', 'NewsController@addNews')->name('addNews');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');

    Route::get('/categories', 'CategoriesController@all')->name('categories');
    Route::match(['post', 'get'], '/addCategory', 'CategoriesController@addCategory')->name('addCategory');
    Route::get('/updateCategory{news}', 'CategoriesController@update')->name('updateCategory');
    Route::post('/saveCategory{news}', 'CategoriesController@save')->name('saveCategory');
    Route::get('/deleteCategory{category}', 'CategoriesController@delete')->name('deleteCategory');

});

=======
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::match(['post', 'get'], '/addNews', 'IndexController@addNews')->name('addNews');
    Route::get('/addNews2', 'IndexController@addNews2')->name('addNews2');
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');
});

>>>>>>> master

Auth::routes();

