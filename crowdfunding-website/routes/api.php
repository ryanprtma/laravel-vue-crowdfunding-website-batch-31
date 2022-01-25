<?php

use Illuminate\Http\Request;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'Auth'
], function(){
    Route::post('register', 'RegisterController');
    Route::post('regenerate-otp', 'RegenerateOtpCodeController');
    Route::post('verification', 'VerificationController');
    Route::post('update-password', 'UpdatePasswordController');
    Route::post('login', 'LoginController'); 
});

Route::middleware(['api', 'emailverified', 'auth:api'])->group(function(){
    Route::get('profile/show', 'ProfileController@show');
    // Route::get('/admin', 'TestController@admin');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'campaign',
], function(){
    Route::get('random/{count}', 'CampaignController@random');
    Route::post('store', 'CampaignController@store');
    Route::get('/', 'CampaignController@index');
    Route::get('/{id}', 'CampaignController@detail');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'blog',
], function(){
    Route::get('random/{count}', 'BLogController@random');
    Route::post('store', 'BlogController@store');
});