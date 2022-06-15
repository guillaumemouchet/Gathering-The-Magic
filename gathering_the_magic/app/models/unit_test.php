<?php
/**
 * Test code executed to make sure everything works as it should
 */
require_once "app/models/Card.php";

class UnitTest
{
    public static function testWrongAuthentification()
    {
        $result = User::authentification("Wrong name","Wrong password");
        if($result === false)
        {
            echo "failed authentification test passed";
        }
        else
        {
            echo "failed authentification test did not pass";
        }
    }
    public static function testCorrectAuthentification()
    {
        $result = User::authentification("toto", "pass");
        if($result === true)
        {
            if($_SESSION['User_id'] === "1" && $_SESSION['Username'] === "toto")
            {
                echo "Authentification test passed";
            }
            else
            {
                echo "Authentification test did not pass";
            }

        }
        else
        {
            echo "Authentification test did not pass";
        }
    }
}