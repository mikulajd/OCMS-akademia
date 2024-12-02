<?php

namespace AppUser\User;

class Helpers

{

    static function generateToken(): string
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvxyz";
        $token = '';

        for ($i = 0; $i < 60; $i++) {
            $token .= $chars[rand(0, 35)];
        }
        return $token;
    }

    static function generateResponse(bool $success, string $message, $token)
    {
        return response([
            "success" => $success,
            "message" => $message,
            "token" => $token,
        ]);
    }
}
