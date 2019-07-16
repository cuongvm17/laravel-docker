<?php

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout');
    Route::post('signup', 'AuthController@signup');
    Route::get('verify/{token}', 'AuthController@verify');

    Route::resource('profile', 'ProfileController', ['only' => ['index', 'store']]);
    Route::resource('users', 'UserResourceController', ['only' => ['index', 'show']]);
});
