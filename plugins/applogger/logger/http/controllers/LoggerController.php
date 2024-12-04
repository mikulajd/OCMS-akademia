<?php

namespace AppLogger\Logger\Http\Controllers;

use AppLogger\Logger\Models\Log;
use Exception;

class LoggerController
{
    public function getAllLogs()
    {
        $user_id = input('user_id');
        return Log::where('user_id', $user_id)->get();
    }

    public function getSortedLogs()
    {
        $column = input('column', 'id');
        $sortType = input('sortType', 'asc');
        $user_id = input('user_id');
        return Log::where('user_id', $user_id)->orderBy($column, $sortType)->get();
    }
    public function deleteLog($id)
    {
        $user_id = input('user_id');
        $log = Log::where('id', $id)->first();
        if ($log != null && $log->user_id != $user_id) {
            throw new Exception("Unnauthorized", 401);
        }
        return response(Log::where('id', $id)->where('user_id', $user_id)->delete());
    }
    public function addLog()
    {
        $data = request()->all();
        $log = new Log();
        $log->fill($data);
        $log->save();
        return $log; // REVIEW - Tip - V tomto prípade by tu stačilo aj "return $log"
    }
}
