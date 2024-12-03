<?php

namespace AppUser\User\Http\Controllers;

use AppUser\User\Models\User;
use AppUser\User\AuthServices;
use Hash;

class UsersController
{
    public function signUp()
    {

        $userName = post('user_name');
        $password = post('password');
        $user = User::firstWhere('user_name', $userName);
        if ($user != null) {
            return AuthServices::generateAuthResponse(false, "User with this name already exists", null);
        }

        // $hashedPw = Hash::make($password);
        $user = new User();
        $user->fill(input());
        // $user->user_name = $userName;
        $token = AuthServices::generateToken();
        $user->token = $token;
        // $user->password = $hashedPw;
        $success = $user->save();
        if (!$success) {
            $token = null;
        }
        return AuthServices::generateAuthResponse($success, "", $token);
    }

    public function signIn()
    {
        $userName = post('user_name');
        $password = post('password');
        $user = User::firstWhere('user_name', $userName);
        if ($user == null) {
            return AuthServices::generateAuthResponse(false, "User with this name does not exist", null);
        }
        if (!Hash::check($password, $user->password)) {
            return AuthServices::generateAuthResponse(false, "Wrong password", null);
        }
        return AuthServices::generateAuthResponse(true, "", $user->token);
    }

    public function changePassword()
    {
        $userName = post('user_name');
        $oldPassword = post('oldPassword');
        $newPassword = post('newPassword');
        $user = User::firstWhere('user_name', $userName);
        if ($user == null) {
            return AuthServices::generateAuthResponse(false, "User with this name does not exist", null);
        }
        if (!Hash::check($oldPassword, $user->password)) {
            return AuthServices::generateAuthResponse(false, "Wrong password", null);
        }
        $user->password = $newPassword;
        $success = $user->save();
        if ($success) {
            $message = "Password successfully changed";
        } else {
            $message = "Error when changing password";
        }
        return AuthServices::generateAuthResponse($success, $message, null);
    }
}
