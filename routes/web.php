<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('Test',function (){
//    return view('test');
// });
Route::group(['namespace'=>'Site'], function () {
    Route::get('/testSite','IndexController@index') -> name('index.testSite');
    Route::get('/','IndexController@index') -> name('index.site');
    Route::get('watch/{id}/{vid_req}','IndexController@watch')->name('index.watch');
    Route::get('tbMatches','IndexController@tbMatches')->name('index.tbMatches');

});
