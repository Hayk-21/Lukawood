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
Imgfly::routes();
Route::redirect('/home', '/');

Route::get('/403',function(){
    abort(403);
});

Route::get('/404',function(){
    abort(404);
});

// Call
Route::post('/api/maincall', 'Api\ApiController@maincall')->name('maincall');
Route::post('/api/call', 'Api\ApiController@call')->name('call');
Route::post('/api/moreimages', 'Api\ApiController@moreimages')->name('moreimages');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/', 'HomeController@index')->name('home');


Route::get('catalog/{path?}', 'CatalogController@index')->where('path', '[a-zA-Z0-9\-/_]+')->name('catalog');
Route::get('{page?}', 'PageController@index')->where('page', '^[a-zA-Z0-9-_]+$')->name('page');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
 
    return "Кэш очищен.";
});