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
Route::get('/auth/facebook', 'LoginController@loginFB')->name('fbLogin');
Route::get('/auth/facebook/response', 'LoginController@responseFB')->name('fbResponse');
Route::get('/auth/google', 'LoginController@loginGoogle')->name('googleLogin');
Route::get('/auth/google/response', 'LoginController@responseGoogle')->name('googleResponse');
Route::get('/auth/github', 'LoginController@loginGithub')->name('githubLogin');
Route::get('/auth/github/response', 'LoginController@responseGithub')->name('githubResponse');

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

    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::post('/parser', 'ParserController@parser')->name('parser');
    Route::post('/parser_save', 'ParserController@saveNews')->name('parser.saveNews');
    Route::post('/parser_delete', 'ParserController@deleteNews')->name('parser.deleteNews');

});

Route::get('/vue', 'HomeController@vue')->name('vue');

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('/profile{user}', 'UserController@edit')->name('profile.edit');
    Route::post('/profile{user}', 'UserController@update')->name('profile.update');
});

/* todo

сделать добавить свой кастомный пасинг других сайтов (habr) (?)

Привести в порядок роуты (все к компактному виду, типа ресурс)
Сделать тесты(!)

сделать отображение времени пользователя через $time=now();$time->diffForHumans...

--------------
2. Создать миграцию для добавления в базу новой таблицы resources. Она будет хранить информацию о ресурсах, с которых необходимо забирать новости. Добавить интерфейс для редактирования и добавления данных в эту таблицу.
---3. Реализовать алгоритм получения новых новостей из ресурсов, сохраненных в таблице resources, с добавлением нужной информации в таблицу news.
4. Используя очереди, реализовать алгоритм параллельного запроса информации из сторонних сервисов с выводом ее пользователю в браузер.
Убрать Seeding новостей. Т.е. новости не должны случайно заполняться, а должны парситься реальными по команде из админки.

*/

