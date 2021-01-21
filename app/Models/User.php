<?php


namespace App\Models;


class User
{
    public function getUsernameAndPassword($firstName, $password)
    {
        return \DB::table("users as u")
            ->join("roles as r", "u.roleId", "=", "r.roleId")
            ->where([
                ["firstName", "=", $firstName],
                ["passwordHash", "=", md5($password)]
            ])->first();
    }
}
