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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/auth/vk', 'LoginController@loginVK')->name('vkLogin');
Route::get('/auth/vk/response', 'LoginController@responseVK')->name('vkResponse');

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
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
<<<<<<< HEAD
=======
<<<<<<< HEAD
    Route::get('/index', 'NewsController@all')->name('news');
>>>>>>> master
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

<<<<<<< HEAD
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::post('/parser', 'ParserController@parser')->name('parser');

});

Route::get('/vue', 'HomeController@vue')->name('vue');
Route::post('/', 'HomeController@telegram')->name('telegram');

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/profile{user}', 'UserController@edit')->name('profile.edit');
    Route::post('/profile{user}', 'UserController@update')->name('profile.update');
});
=======
<<<<<<< HEAD
});
=======
=======
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::match(['post', 'get'], '/addNews', 'IndexController@addNews')->name('addNews');
    Route::get('/addNews2', 'IndexController@addNews2')->name('addNews2');
    Route::match(['post', 'get'], '/download', 'IndexController@downloadForm')->name('download');
});

>>>>>>> master
>>>>>>> master

>>>>>>> 0147a26da9ff9554c65dbc8412676ff47c4046a5


