<?php

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::resource('user', 'UserController', ['only' => ['index', 'show']]);
});
