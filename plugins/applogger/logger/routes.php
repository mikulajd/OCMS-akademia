<?php

use AppLogger\Logger\Http\Controllers\LoggerController;
use AppUser\User\Http\Middleware\AuthMiddleware;

Route::group(['middleware' => [AuthMiddleware::class]], function () {

    Route::group(['prefix' => 'logs'], function () {

        Route::get('/', [LoggerController::class, 'getAllLogs']);

        Route::get('/sort', [LoggerController::class, 'getSortedLogs']);

        Route::delete('/delete/{id}',  [LoggerController::class, 'deleteLog']);
    });

    Route::post('/log', [LoggerController::class, 'addLog']);
});
