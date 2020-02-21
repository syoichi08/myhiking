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
Auth::routes();
/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
    // トップページ
    Route::get('news/index', 'Admin\NewsController@index');
    // 検索結果詳細画面
    Route::get('news/detail', 'Admin\NewsController@detail');
    
/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
 Route::group(['middleware' => 'auth:user'], function()
{   
    Route::get('/home', 'HomeController@index')->name('home');
    // 記録の新規作成画面
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    // 自分投稿記録の検索画面
    Route::get('news/index_edit', 'Admin\NewsController@index_edit');
    // 記録の編集画面と削除
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    // ユーザーアカウントの編集
    Route::get('user/index', 'Admin\UserController@index');
    Route::get('user/edit', 'Admin\UserController@edit');
    Route::post('user/edit', 'Admin\UserController@update');
    Route::get('user/change_password', 'Admin\UserController@password_edit');
    Route::post('user/change_password', 'Admin\UserController@password_update');
    
    // Route::get('profile/create', 'Admin\ProfileController@add');
    // Route::post('profile/create', 'Admin\ProfileController@create');
    // Route::get('profile/edit', 'Admin\ProfileController@edit');
    // Route::post('profile/edit', 'Admin\ProfileController@update');
});


/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');
});
