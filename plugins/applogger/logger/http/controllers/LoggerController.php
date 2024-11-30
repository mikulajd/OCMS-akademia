<?php

namespace AppLogger\Logger\Http\Controllers;

use AppLogger\Logger\Models\Log;


class LoggerController
{
    public function getAllLogs()
    {
        return Log::all();
    }
    public function getLogsByName($name)
    {
        return Log::where('name', $name)->get();
    }
    public function getSortedLogs()
    {
        $column = input('column', 'id');
        $sortType = input('sortType', 'asc');
        return Log::orderBy($column, $sortType)->get();
    }
    public function deleteLogs()
    {
        $column = input('column');
        $value = input('value',);
        if (!$column || !$value) {
            return response()->json(['error' => 'Column and value are required'], 400);
        }

        return Log::where($column, $value)->delete();
    }
    public function addLog()
    {
        $data = request()->all();
        $log = new Log();
        $log->fill($data);
        $log->save();
        return response()->json($log, 201);
    }
}
