<?php

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});
