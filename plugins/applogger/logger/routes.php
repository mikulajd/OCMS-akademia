<?php

use AppLogger\Logger\Http\Controllers\LoggerController;
use AppLogger\Logger\Middleware\AuthMiddleware;

Route::group(['middleware' => [AuthMiddleware::class]], function () {

    Route::group(['prefix' => 'logs'], function () {

        Route::get('/', [LoggerController::class, 'getAllLogs']);

        Route::get('/sort', [LoggerController::class, 'getSortedLogs']);

        Route::get('/{name}', [LoggerController::class, 'getLogsByName']);

        Route::delete('/delete',  [LoggerController::class, 'deleteLogs']);
    });

    Route::post('/log', [LoggerController::class, 'addLog']);
});
