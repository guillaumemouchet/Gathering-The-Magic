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
            echo "Failed authentification test passed <br>";
        }
        else
        {
            echo "Failed authentification test did not pass <br>";
        }
    }
    public static function testCorrectAuthentification()
    {
        $result = User::authentification("toto", "pass");
        if($result === true)
        {
            if($_SESSION['User_id'] === "1" && $_SESSION['Username'] === "toto")
            {
                echo "Authentification test passed <br>";
            }
            else
            {
                echo "Authentification test did not pass <br>";
            }

        }
        else
        {
            echo "Authentification test did not pass <br>";
        }
    }
}