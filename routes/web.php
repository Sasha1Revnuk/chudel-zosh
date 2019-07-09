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
Route::get('/atestation', 'AtestationController@index')->name('attestation');
Route::get('/library', 'LibraryController@index')->name('library');
Route::get('/psychological-service', 'PsychologicalServiceController@index')->name('psychological-service');
Route::get('/civil-save', 'CivilSaveController@index')->name('civil-save');
Route::get('/normy', 'NormyController@index')->name('normy');
Route::get('/methodical-work', 'MethodicalWorkController@index')->name('methodical-work');
Route::get('/mo-teachers', 'MoTeachersController@index')->name('mo-teachers');
Route::get('/educational-activities', 'EducationalActivitiesController@index')->name('educational-activities');
Route::get('/educational-work', 'EducationalWorkController@index')->name('educational-work');
Route::get('/inclusive-education', 'InclusiveEducationController@index')->name('inclusive-education');
Route::get('/professional-training-and-career-guidance', 'ProfessionalTrainingAndCareerGuidanceController@index')->name('professional-training-and-career-guidance');
Route::get('/nush', 'NushController@index')->name('nush');
Route::get('/zno-dpa', 'ZnoDpaController@index')->name('zno-dpa');
Route::get('/public-information', 'PublicInformationController@index')->name('public-information');
Route::get('/for-pupils', 'ForPupilsController@index')->name('for-pupils');
Route::get('/for-parents', 'ForParants@index')->name('for-parents');
Route::get('/our-pride', 'OurPride@index')->name('our-pride');
Route::get('/archive', 'ArchiveController@index')->name('archive');

Route::get('/news', 'NewsController@index')->name('news');
Route::get('/news/view/{url}', 'NewsController@view')->name('news-view');
Route::get('/news/search', 'NewsController@index')->name('news-search');

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

    Route::group(['prefix' => 'main-text'], function () {
        Route::get('/', 'Admin\IndexController@mainText')->name('admin-main-text');
        Route::post('/save', 'Admin\IndexController@saveMainText')->name('admin-main-text-save');

    });

    Route::group(['prefix' => 'atestation'], function () {
        Route::get('/', 'Admin\AtestationController@index')->name('admin-atestation');
        Route::get('/delete/{id}', 'Admin\AtestationController@delete')->name('delete-admin-atestation');
        Route::get('/edit/{id}', 'Admin\AtestationController@edit')->name('edit-admin-atestation');
        Route::get('/add', 'Admin\AtestationController@add')->name('add-admin-atestation');
        Route::post('/save', 'Admin\AtestationController@save')->name('save-admin-atestation');
    });

    Route::group(['prefix' => 'library'], function () {
        Route::get('/', 'Admin\LibraryController@index')->name('admin-library');
        Route::get('/delete/{id}', 'Admin\LibraryController@delete')->name('delete-admin-library');
        Route::get('/edit/{id}', 'Admin\LibraryController@edit')->name('edit-admin-library');
        Route::get('/add', 'Admin\LibraryController@add')->name('add-admin-library');
        Route::post('/save', 'Admin\LibraryController@save')->name('save-admin-library');
    });

    Route::group(['prefix' => 'psychological-service'], function () {
        Route::get('/', 'Admin\PsychologicalServiceController@index')->name('admin-psychological-service');
        Route::get('/delete/{id}', 'Admin\PsychologicalServiceController@delete')->name('delete-admin-psychological-service');
        Route::get('/edit/{id}', 'Admin\PsychologicalServiceController@edit')->name('edit-admin-psychological-service');
        Route::get('/add', 'Admin\PsychologicalServiceController@add')->name('add-admin-psychological-service');
        Route::post('/save', 'Admin\PsychologicalServiceController@save')->name('save-admin-psychological-service');
    });

    Route::group(['prefix' => 'civil-save'], function () {
        Route::get('/', 'Admin\CivilSaveController@index')->name('admin-civil-save');
        Route::get('/delete/{id}', 'Admin\CivilSaveController@delete')->name('delete-admin-civil-save');
        Route::get('/edit/{id}', 'Admin\CivilSaveController@edit')->name('edit-admin-civil-save');
        Route::get('/add', 'Admin\CivilSaveController@add')->name('add-admin-civil-save');
        Route::post('/save', 'Admin\CivilSaveController@save')->name('save-admin-civil-save');
    });

    Route::group(['prefix' => 'normy'], function () {
        Route::get('/', 'Admin\NormyController@index')->name('admin-normy');
        Route::get('/delete/{id}', 'Admin\NormyController@delete')->name('delete-admin-normy');
        Route::get('/edit/{id}', 'Admin\NormyController@edit')->name('edit-admin-normy');
        Route::get('/add', 'Admin\NormyController@add')->name('add-admin-normy');
        Route::post('/save', 'Admin\NormyController@save')->name('save-admin-normy');
    });

    Route::group(['prefix' => 'methodical-work'], function () {
        Route::get('/', 'Admin\MethodicalWorkController@index')->name('admin-methodical-work');
        Route::get('/delete/{id}', 'Admin\MethodicalWorkController@delete')->name('delete-admin-methodical-work');
        Route::get('/edit/{id}', 'Admin\MethodicalWorkController@edit')->name('edit-admin-methodical-work');
        Route::get('/add', 'Admin\MethodicalWorkController@add')->name('add-admin-methodical-work');
        Route::post('/save', 'Admin\MethodicalWorkController@save')->name('save-admin-methodical-work');
    });

    Route::group(['prefix' => 'mo-teachers'], function () {
        Route::get('/', 'Admin\MoTeachersController@index')->name('admin-mo-teachers');
        Route::get('/delete/{id}', 'Admin\MoTeachersController@delete')->name('delete-admin-mo-teachers');
        Route::get('/edit/{id}', 'Admin\MoTeachersController@edit')->name('edit-admin-mo-teachers');
        Route::get('/add', 'Admin\MoTeachersController@add')->name('add-admin-mo-teachers');
        Route::post('/save', 'Admin\MoTeachersController@save')->name('save-admin-mo-teachers');
    });

    Route::group(['prefix' => 'educational-activities'], function () {
        Route::get('/', 'Admin\EducationalActivitiesController@index')->name('admin-educational-activities');
        Route::get('/delete/{id}', 'Admin\EducationalActivitiesController@delete')->name('delete-educational-activities');
        Route::get('/edit/{id}', 'Admin\EducationalActivitiesController@edit')->name('edit-admin-educational-activities');
        Route::get('/add', 'Admin\EducationalActivitiesController@add')->name('add-admin-educational-activities');
        Route::post('/save', 'Admin\EducationalActivitiesController@save')->name('save-admin-educational-activities');
    });

    Route::group(['prefix' => 'educational-work'], function () {
        Route::get('/', 'Admin\EducationalWorkController@index')->name('admin-educational-work');
        Route::get('/delete/{id}', 'Admin\EducationalWorkController@delete')->name('delete-educational-work');
        Route::get('/edit/{id}', 'Admin\EducationalWorkController@edit')->name('edit-admin-educational-work');
        Route::get('/add', 'Admin\EducationalWorkController@add')->name('add-admin-educational-work');
        Route::post('/save', 'Admin\EducationalWorkController@save')->name('save-admin-educational-work');
    });

    Route::group(['prefix' => 'inclusive-education'], function () {
        Route::get('/', 'Admin\InclusiveEducationController@index')->name('admin-inclusive-education');
        Route::post('/save', 'Admin\InclusiveEducationController@save')->name('save-inclusive-education');

    });

    Route::group(['prefix' => 'professional-training-and-career-guidance'], function () {
        Route::get('/', 'Admin\ProfessionalTrainingAndCareerGuidanceController@index')->name('admin-professional-training-and-career-guidance');
        Route::get('/delete/{id}', 'Admin\ProfessionalTrainingAndCareerGuidanceController@delete')->name('delete-admin-professional-training-and-career-guidance');
        Route::get('/edit/{id}', 'Admin\ProfessionalTrainingAndCareerGuidanceController@edit')->name('edit-admin-professional-training-and-career-guidance');
        Route::get('/add', 'Admin\ProfessionalTrainingAndCareerGuidanceController@add')->name('add-admin-professional-training-and-career-guidance');
        Route::post('/save', 'Admin\ProfessionalTrainingAndCareerGuidanceController@save')->name('save-admin-professional-training-and-career-guidance');
    });

    Route::group(['prefix' => 'nush'], function () {
        Route::get('/', 'Admin\NushController@index')->name('admin-nush');
        Route::get('/delete/{id}', 'Admin\NushController@delete')->name('delete-admin-nush');
        Route::get('/edit/{id}', 'Admin\NushController@edit')->name('edit-admin-nush');
        Route::get('/add', 'Admin\NushController@add')->name('add-admin-nush');
        Route::post('/save', 'Admin\NushController@save')->name('save-admin-nush');
    });

    Route::group(['prefix' => 'zno-dpa'], function () {
        Route::get('/', 'Admin\ZnoDpaController@index')->name('admin-zno-dpa');
        Route::get('/delete/{id}', 'Admin\ZnoDpaController@delete')->name('delete-admin-zno-dpa');
        Route::get('/edit/{id}', 'Admin\ZnoDpaController@edit')->name('edit-admin-zno-dpa');
        Route::get('/add', 'Admin\ZnoDpaController@add')->name('add-admin-zno-dpa');
        Route::post('/save', 'Admin\ZnoDpaController@save')->name('save-admin-zno-dpa');
    });

    Route::group(['prefix' => 'public-information'], function () {
        Route::get('/', 'Admin\PublicInformationController@index')->name('admin-public-information');
        Route::get('/delete/{id}', 'Admin\PublicInformationController@delete')->name('delete-admin-public-information');
        Route::get('/edit/{id}', 'Admin\PublicInformationController@edit')->name('edit-admin-public-information');
        Route::get('/add', 'Admin\PublicInformationController@add')->name('add-admin-public-information');
        Route::post('/save', 'Admin\PublicInformationController@save')->name('save-admin-public-information');
    });

    Route::group(['prefix' => 'news'], function () {
        Route::get('/', 'Admin\NewsController@index')->name('admin-news');
        Route::get('/delete/{id}', 'Admin\NewsController@delete')->name('delete-news');
        Route::get('/edit/{id}', 'Admin\NewsController@edit')->name('edit-news');
        Route::get('/access/{id}', 'Admin\NewsController@access')->name('access-news');
        Route::get('/add', 'Admin\NewsController@add')->name('add-news');
        Route::post('/save', 'Admin\NewsController@save')->name('save-news');
    });

    Route::group(['prefix' => 'for-pupils'], function () {
        Route::get('/', 'Admin\ForPupilsController@index')->name('admin-for-pupils');
        Route::get('/delete/{id}', 'Admin\ForPupilsController@delete')->name('delete-admin-for-pupils');
        Route::get('/edit/{id}', 'Admin\ForPupilsController@edit')->name('edit-admin-for-pupils');
        Route::get('/add', 'Admin\ForPupilsController@add')->name('add-admin-for-pupils');
        Route::post('/save', 'Admin\ForPupilsController@save')->name('save-admin-for-pupils');
    });

    Route::group(['prefix' => 'for-parents'], function () {
        Route::get('/', 'Admin\ForParantsController@index')->name('admin-for-parents');
        Route::get('/delete/{id}', 'Admin\ForParantsController@delete')->name('delete-admin-for-parents');
        Route::get('/edit/{id}', 'Admin\ForParantsController@edit')->name('edit-admin-for-parents');
        Route::get('/add', 'Admin\ForParantsController@add')->name('add-admin-for-parents');
        Route::post('/save', 'Admin\ForParantsController@save')->name('save-admin-for-parents');
    });

    Route::group(['prefix' => 'our-pride'], function () {
        Route::get('/', 'Admin\OurPrideController@index')->name('admin-our-pride');
        Route::get('/delete/{id}', 'Admin\OurPrideController@delete')->name('delete-admin-our-pride');
        Route::get('/edit/{id}', 'Admin\OurPrideController@edit')->name('edit-admin-our-pride');
        Route::get('/add', 'Admin\OurPrideController@add')->name('add-admin-our-pride');
        Route::post('/save', 'Admin\OurPrideController@save')->name('save-admin-our-pride');
    });

    Route::group(['prefix' => 'archive'], function () {
        Route::get('/', 'Admin\ArchiveController@index')->name('admin-archive');
        Route::get('/delete/{id}', 'Admin\ArchiveController@delete')->name('delete-admin-archive');
        Route::get('/edit/{id}', 'Admin\ArchiveController@edit')->name('edit-admin-archive');
        Route::get('/add', 'Admin\ArchiveController@add')->name('add-admin-archive');
        Route::post('/save', 'Admin\ArchiveController@save')->name('save-admin-archive');
    });

    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', 'Admin\SettingsController@index')->name('admin-settings');
        Route::post('/save', 'Admin\SettingsController@save')->name('save-settings');

    });

});

