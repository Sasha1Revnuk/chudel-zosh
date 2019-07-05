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
Route::get('/business-school', 'SymbolismController@index')->name('visitka');
Route::get('/school-history', 'HistoryController@index')->name('history');
Route::get('/teachers', 'TeachersController@index')->name('teachers');
Route::get('/gallery', 'PhotoController@index')->name('gallery');
Route::get('/albums/{id}', 'PhotoController@albums')->name('albums');
Route::get('/documents', 'DocumentsController@index')->name('documents');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/view/{url}', 'NewsController@view')->name('news-view');
Route::get('/news/search', 'NewsController@index')->name('news-search');
Route::get('/news/search/year/{year}', 'NewsController@index')->name('news-year-search');

Route::get('/announcements', 'AnnouncementController@index')->name('announcement');
Route::get('/announcements/view/{url}', 'AnnouncementController@view')->name('announcement-view');
Route::get('/announcements/search', 'AnnouncementController@index')->name('announcement-search');
Route::get('/announcements/search/year/{year}', 'AnnouncementController@index')->name('announcement-year-search');

Route::get('/methodical-works', 'MethodicalWorksController@index')->name('methodical-works');
Route::get('/methodical-works/view/{url}', 'MethodicalWorksController@view')->name('methodical-works-view');
Route::get('/methodical-works/search', 'MethodicalWorksController@index')->name('methodical-works-search');
Route::get('/methodical-works/search/year/{year}', 'MethodicalWorksController@index')->name('methodical-works-year-search');

Route::get('/educational-works', 'EducationalWorksController@index')->name('educational-works');
Route::get('/educational-works/view/{url}', 'EducationalWorksController@view')->name('educational-works-view');
Route::get('/educational-works/search', 'EducationalWorksController@index')->name('educational-works-search');
Route::get('/educational-works/search/year/{year}', 'EducationalWorksController@index')->name('educational-works-year-search');

Route::get('/zno', 'ZnoController@index')->name('zno');
Route::get('/zno/view/{url}', 'ZnoController@view')->name('zno-view');
Route::get('/zno/search', 'ZnoController@index')->name('zno-search');
Route::get('/zno/search/year/{year}', 'ZnoController@index')->name('zno-search');

Route::get('/dpa', 'DpaController@index')->name('dpa');
Route::get('/dpa/view/{url}', 'DpaController@view')->name('dpa-view');
Route::get('/dpa/search', 'DpaController@index')->name('dpa-search');
Route::get('/dpa/search/year/{year}', 'DpaController@index')->name('dpa-search');

Route::get('/shedule', 'SheduleController@index')->name('shedule');
Route::get('/call-shedule', 'CallSheduleController@index')->name('call-shedule');
Route::get('/rules', 'RulesController@index')->name('rules');
Route::get('/contacts', 'ContactsController@index')->name('contacts');
Route::post('/contacts', 'ContactsController@send')->name('contacts-post');

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
});

