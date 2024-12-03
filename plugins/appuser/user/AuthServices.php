<?php

namespace AppUser\User;

class AuthServices

{

    public static function generateToken(): string
    {
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvxyz";
        $token = '';

        for ($i = 0; $i < 60; $i++) {
            $token .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $token;
    }

    public   static function generateAuthResponse(bool $success, string $message, $token)
    {
        return response([
            "success" => $success,
            "message" => $message,
            "token" => $token,
        ]);
    }
}
