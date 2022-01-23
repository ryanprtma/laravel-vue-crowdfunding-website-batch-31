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

// Route::get('/', function () {
//     return view('app');
// });

// Route::get('/{any?}', function(){
//     return 'masuk ke sini';
// })->where('any', '.*');

Route::view('/{any}', 'app')->where('any', '.*');

// Route::get('/test', 'TestController@test')->middleware('dateMiddleware');

// Route::middleware('auth')->group(function(){
//     Route::get('/test', 'TestController@test');
// });

// Route::middleware(['auth', 'admin', 'emailverified'])->group(function(){
//     Route::get('/test1', 'TestController@test1');
//     Route::get('/admin', 'TestController@admin');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/route-1', function(){
//     return 'masuk ke route-1';
// })->middleware(['auth', 'emailverified']);
