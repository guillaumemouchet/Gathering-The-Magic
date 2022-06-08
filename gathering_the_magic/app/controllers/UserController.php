<?php
require_once "app/models/User.php";

class UserController
{

    public function index()
    {
        if (isset($_SESSION["User_id"])) {
            return Helper::view("index");
        }
        return Helper::view("login");
    }

    public static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST)) {
                if (User::authentification($_POST["user_input"], $_POST["password_input"])) {
                    return Helper::view("index");
                } else {
                    $_SESSION['message'] = "Wrong username or password";
                    return Helper::view("login");
                }
            }
        }
    }

    public static function logout()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST)) {

                unset($_SESSION["User_id"]);
                unset($_SESSION["Username"]);
                return Helper::view("index");

            }
        }
    }
}
