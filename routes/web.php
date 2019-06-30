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

Route::get('/adm', 'Admin\IndexController@index')->name('main-admin');
Route::get('/', 'IndexController@index')->name('main');
Route::get('/logout', function(){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('main');
});
Route::get('/business-school', 'SymbolismController@index')->name('visitka');
Route::get('/school-history', 'HistoryController@index')->name('history');
Route::get('/teachers', 'TeachersController@index')->name('teachers');
Route::get('/gallery', 'PhotoController@index')->name('gallery');
Route::get('/albums/{id}', 'PhotoController@albums')->name('albums');
Route::get('/documents', 'DocumentsController@index')->name('documents');

