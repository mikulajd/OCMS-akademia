<?php

use AppUser\User\Http\Controllers\UsersController;

Route::group(['prefix' => 'auth'], function () {

    Route::post('/signUp', [UsersController::class, 'signUp']);
    Route::post('/signIn', [UsersController::class, 'signIn']);
});
