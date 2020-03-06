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
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');

    Route::resource('news', 'NewsController')->except(['show']);

    Route::get('/categories', 'CategoriesController@all')->name('categories');
    Route::match(['post', 'get'], '/addCategory', 'CategoriesController@addCategory')->name('addCategory');
    Route::get('/updateCategory{news}', 'CategoriesController@update')->name('updateCategory');
    Route::post('/saveCategory{news}', 'CategoriesController@save')->name('saveCategory');
    Route::get('/deleteCategory{category}', 'CategoriesController@delete')->name('deleteCategory');

});


Auth::routes();


