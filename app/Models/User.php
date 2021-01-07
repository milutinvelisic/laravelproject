<?php


namespace App\Models;


class User
{
    public function getUsernameAndPassword($firstName, $password)
    {
        return \DB::table("users as u")
            ->join("roles as r", "u.idRole", "=", "r.idRole")
            ->where([
                ["firstName", "=", $firstName],
                ["passwordHash", "=", md5($password)]
            ])->first();
    }

    public function registerUser($crUsername, $crEmail, $crPassword)
    {
        return \DB::table('users')
            ->insert([
                ["username" => $crUsername, "email" => $crEmail, "password" => md5($crPassword), "originalPassword" => $crPassword, "active" => 0, "idRole" => 2]
            ]);
    }
}
