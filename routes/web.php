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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
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
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');

    Route::resource('news', 'NewsController')->except(['show']);

    Route::get('/categories', 'CategoriesController@all')->name('categories');
    Route::match(['post', 'get'], '/addCategory', 'CategoriesController@add')->name('categories.add');
    Route::get('/updateCategory{category}', 'CategoriesController@update')->name('categories.update');
    Route::post('/saveCategory{category}', 'CategoriesController@save')->name('categories.save');
    Route::get('/deleteCategory{category}', 'CategoriesController@delete')->name('categories.delete');

    Route::get('/profiles', 'ProfileController@index')->name('profiles');
    Route::get('/changeProfile{user}', 'ProfileController@change')->name('profile.change');
    Route::post('/applyProfile{user}', 'ProfileController@apply')->name('profile.apply');

    Route::get('/deleteProfile{user}', 'ProfileController@delete')->name('profile.delete')->middleware('is_super_admin');

});



