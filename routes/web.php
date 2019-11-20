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
//选择博客还是论坛
Route::get('/', 'PagesController@root')->name('root');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//博客文章
Route::prefix('article')->group(function () {
    //选择博客
   	Route::get('/', 'PagesController@root')->name('root');
}); 
//论坛
Route::prefix('forum')->group(function () {
    //选择博客  
   	Route::get('/', 'PagesController@index')->name('home'); 
});
//分类文章
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::resource('projects', 'ProjectsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);

Route::get('topics-all', 'TopicsController@all');
Route::get('likes/{topics_id}', 'TopicsController@likes');
Route::get('getCategory', 'CategoriesController@getCategoryAll');
Route::get('search', 'TopicsController@getSearch');
//文本编辑器上传图片
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');