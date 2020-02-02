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

Route::get('/', function () {
    return view('welcome');
});

// , 'middleware' => 'auth'
Route::group(['prefix' => 'admin'], function()
{
    // トップページ
    Route::get('news/index', 'Admin\NewsController@index');
    // 検索結果詳細画面
    Route::get('news/detail', 'Admin\NewsController@detail');
    // 記録の新規作成画面
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    // 自分投稿記録の検索画面
    Route::get('news/index_edit', 'Admin\NewsController@index_edit');
    // 記録の編集画面と削除
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    
    // Route::get('profile/create', 'Admin\ProfileController@add');
    // Route::post('profile/create', 'Admin\ProfileController@create');
    // Route::get('profile/edit', 'Admin\ProfileController@edit');
    // Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');
