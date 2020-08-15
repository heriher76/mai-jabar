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

Route::get('/', 'PagesController@home');
Route::get('/visi-misi', 'PagesController@visiMisi');
Route::get('/structure-organization/{id}', 'PagesController@showProfile');
Route::get('/structure-organization', 'PagesController@structureOrganization');
Route::get('/gallery-photo', 'PagesController@galleryPhoto');
Route::get('/gallery-video', 'PagesController@galleryVideo');
Route::get('/news', 'PagesController@news');
Route::get('/work-program', 'PagesController@workProgram');
Route::get('/services', 'PagesController@service');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'Admin\AdminPagesController@index');
	Route::resource('/users', 'Admin\UserAdminController');
	Route::resource('/gallery', 'Admin\GalleryAdminController');
	Route::resource('/services', 'Admin\ServiceAdminController');
	Route::resource('/news', 'Admin\NewsAdminController');
	Route::resource('/visi-misi', 'Admin\VisiMisiAdminController');
	Route::resource('/work-program', 'Admin\WorkProgramAdminController');
	Route::resource('/cooperation', 'Admin\CooperationAdminController');
	Route::resource('/structure-organization', 'Admin\StructureOrganizationAdminController');
	Route::resource('/welcome', 'Admin\WelcomeAdminController');
	Route::resource('/overview', 'Admin\OverviewAdminController');
});

Route::get('/{slug}', 'NewsController@show');