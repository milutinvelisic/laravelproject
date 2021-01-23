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

    public function insertContactInfo($request){

//        dd(count($request->input("firstName")));



        for ($i = 0; $i > count($request->input("firstName")); $i++){

            $params .= array('firstName' => $request->input("firstName")[$i]
            , 'lastName' => $request->input("lastName")[$i]
            , 'phoneTypeName' => $request->input("mobile")[$i]
            , 'phoneNumber' => $request->input("phoneNumber")[$i]);
        }

//        dd($params);


        return \DB::table("phonenumbers")->insert($params);
    }
}
