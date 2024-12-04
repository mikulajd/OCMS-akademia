<?php

namespace AppUser\User;

class AuthServices // REVIEW - Services zvyčajne dávame do plugin/classes/services

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

    /* REVIEW - Je fajn že si si zjednotil spôsob ako vracať response pre auth endpointy, ale nie je úplne správny
    1. V hocijakom prípade kde nastane chyba v endpointy, by sa mal vrátiť exception (namiesto toho že vrátiš success = false), to môžeš urobiť takto
    throw new Exception("Wrong Password", 401) - tu môžeš definovať message a status code
    2. ak vraciaš message / token, tak sa automaticky vie že je endpoint prešiel, čiže netreba success = true, inak povedané keď vrátiš message / token tak response má code 200
    Skús upraviť tvoj controller aby sa hodil exception vždy keď nastane chyba a inak vráť iba potrebné dáta ako string / object / ... */
    // public   static function generateAuthResponse(bool $success, string $message, $token)
    // {
    //     return response([
    //         "success" => $success,
    //         "message" => $message,
    //         "token" => $token,
    //     ]);
    // }
}
