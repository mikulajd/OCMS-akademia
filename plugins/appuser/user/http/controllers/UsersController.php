<?php

namespace AppUser\User\Http\Controllers;

use AppUser\User\Models\User;
use AppUser\User\AuthServices;
use Exception;
use Hash;

class UsersController
{
    public function signUp()
    {

        $userName = post('user_name');
        $password = post('password');
        $user = User::firstWhere('user_name', $userName);
        if ($user != null) {
            throw new Exception("User with this name already exists", 401);
        }
        $user = new User();
        $user->fill(input());
        $token = AuthServices::generateToken();
        $user->token = $token;
        $success = $user->save();
        if (!$success) {
            throw new Exception("Problem when creating new user", 401);
        }
        return ['token' => $token];
    }

    public function signIn()
    {
        $userName = post('user_name');
        $password = post('password');
        $user = User::firstWhere('user_name', $userName);
        if ($user == null) {
            throw new Exception("User with this name doesn't exist", 401);
        }
        if (!Hash::check($password, $user->password)) {
            throw new Exception("Wrong password", 401);
        }
        return ['token' => $user->token];
    }

    public function changePassword()
    {
        $userName = post('user_name');
        $oldPassword = post('oldPassword');
        $newPassword = post('newPassword');
        $user = User::firstWhere('user_name', $userName);
        if ($user == null) {
            throw new Exception("User with this name doesn't exist", 401);
        }
        if (!Hash::check($oldPassword, $user->password)) {
            throw new Exception("Wrong password", 401);
        }
        $user->password = $newPassword;
        $success = $user->save();
        if ($success) {
            return ['message' => "Password successfully changed"];
        } else {
            throw new Exception("Error when changing password", 401);
        }
    }
}
