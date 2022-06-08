<?php

class User extends Model
{
    public static function authentification($name, $password)
    {
        $hash_password = hash("sha256", $password);
        $params = [
            "search" => "username=:name AND password=:password",
            "binding" => [
                "name" => [$name, PDO::PARAM_STR],
                "password" => [$hash_password, PDO::PARAM_STR]
            ]
        ];

        $userId = User::searchId("user", $params);

        if (-1 != $userId) {
            $_SESSION['User_id'] = $userId;
            $_SESSION['Username'] = $name;
            return true;
        } else {

            return false;
        }
    }
}
