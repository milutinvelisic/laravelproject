<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        return view("pages.login");
    }

    public function login(LoginRequest $request)
    {

        $firstName = $request->input("logFirstName");
        $password = $request->input("logPassword");

        try {

            $user = $this->userModel->getUsernameAndPassword($firstName, $password);

            if ($user) {

                $request->session()->put("user", $user);

                    if($request->session()->get("user")->roleId == 1){
                        return redirect("/admin")->with("msg", "You logged in successfully!");
                    }else{
                        return redirect("/home")->with("msg", "You logged in successfully!");
                    }
            } else {
                \Log::warning('Couldnt find user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
                return redirect("/login")->with("msg", "Please try again!");
            }
        } catch (\Exception $ex) {
            \Log::warning($ex->getMessage());
            return redirect("/login")->with("msg", "Wrong username and/or password!");
        }
    }

    public function logout(Request $request)
    {
        $userUsername = $request->session()->get("user")->firstName;

        if ($userUsername) {

            $request->session()->forget("user");
            $request->session()->flush();
            return redirect("/home")->with("msg", "Logged out!");
        } else {
            \Log::warning('Couldnt logout in user at:' . $_SERVER['REQUEST_URI'] . " at time: " . time());
            return redirect("/login")->with("msg", "Error with logout!");
        }
    }
}
