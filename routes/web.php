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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'GalleryController@index');
Route::post('/creategallery', 'GalleryController@store');
Route::get('/showGallery/{id}', 'GalleryController@showGallery');

Route::get('/delete/{id}', 'GalleryController@delete');

Route::post('/upload', 'ImageController@upload');

