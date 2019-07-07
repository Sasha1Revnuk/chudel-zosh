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





Route::get('/', 'IndexController@index')->name('main');
Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('main');
});


Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/view/{url}', 'NewsController@view')->name('news-view');
Route::get('/news/search', 'NewsController@index')->name('news-search');
Route::get('/news/search/year/{year}', 'NewsController@index')->name('news-year-search');


Route::group(['prefix' => 'adm'], function(){
    Route::get('/', 'Admin\IndexController@index')->name('main-admin');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/delete/{id}', 'Admin\IndexController@userDelete')->name('delete-user');
        Route::get('/set-role/{id}', 'Admin\IndexController@setRole')->name('set-role-user');
        Route::post('/change-password', 'Admin\IndexController@changePassword')->name('change-password');
        Route::post('/change-profile', 'Admin\IndexController@changeProfile')->name('change-profile');

    });

    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', 'Admin\SliderController@index')->name('admin-slider');
        Route::get('/delete/{id}', 'Admin\SliderController@delete')->name('delete-slider');
        Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('edit-slider');
        Route::get('/add', 'Admin\SliderController@add')->name('add-slider');
        Route::post('/save', 'Admin\SliderController@save')->name('save-slider');

    });

    Route::group(['prefix' => 'symbolism'], function () {
        Route::get('/', 'Admin\SymbolismController@index')->name('admin-symbolism');
        Route::post('/save', 'Admin\SymbolismController@save')->name('save-symbolism');

    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'Admin\NewsController@index')->name('admin-news');
        Route::get('/delete/{id}', 'Admin\NewsController@delete')->name('delete-news');
        Route::get('/edit/{id}', 'Admin\NewsController@edit')->name('edit-news');
        Route::get('/access/{id}', 'Admin\NewsController@access')->name('access-news');
        Route::get('/add', 'Admin\NewsController@add')->name('add-news');
        Route::post('/save', 'Admin\NewsController@save')->name('save-news');
    });

});

