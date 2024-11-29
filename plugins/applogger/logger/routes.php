<?php

use AppLogger\Logger\Models\Log;

Route::get('/logs', function () {
    return Log::all();
});
Route::get('/logs/{name}', function ($name) {
    return Log::where('name', $name)->get();
});

Route::get('/logs/sortBy/{column}/{sortType}', function ($column, $sortType) {

    switch ($sortType) {
        case "ascending":
            return Log::orderBy($column, 'asc')->get();
        case "descending":
            return Log::orderBy($column, 'desc')->get();
        default:
            return Log::orderBy($column, 'asc')->get();
    }
});

Route::delete('/log/delete/{column}/{value}', function ($column, $value) {
    return Log::where($column, $value)->delete();
});

Route::post('/log', function () {
    $data = post();
    $blog = new Log();
    $blog->fill($data);
    $blog->save();
});
