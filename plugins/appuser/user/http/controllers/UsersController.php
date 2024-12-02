<?php

namespace AppUser\User\Http\Controllers;

use AppUser\User\Models\User;
use AppUser\User\Helpers;
use Hash;

class UsersController
{
    public function signUp()
    {

        $userName = post('user_name');
        $password = post('password');
        $user = User::firstWhere('user_name', $userName);
        if ($user != null) {
            return Helpers::generateResponse(false, "User with this name already exists", null);
        }
        $hashedPw = Hash::make($password);
        $user = new User();
        $user->user_name = $userName;
        $token = Helpers::generateToken();
        $user->token = $token;
        $user->password = $hashedPw;
        $success = $user->save();
        if (!$success) {
            $token = null;
        }
        return Helpers::generateResponse($success, "", $token);
    }

    public function signIn()
    {
        $userName = post('user_name');
        $password = post('password');
        $user = User::firstWhere('user_name', $userName);
        if ($user == null) {
            return Helpers::generateResponse(false, "User with this name does not exist", null);
        }
        if (Hash::check($password, $user->password)) {
            return Helpers::generateResponse(false, "Wrong password", null);
        }
        return Helpers::generateResponse(true, "", $user->token);
    }
}