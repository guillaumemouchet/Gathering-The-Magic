<?php

/**
 *
 */
class Helper
{
    public static function display($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    // dd = display & die
    public static function dd($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        die();
    }

    public static function view($name, $data = [])
    {
        extract($data); // Importe les variables dans la table des symboles
        // voir: http://php.net/manual/fr/function.extract.
        // voir aussi la méthode compact()
        return require "app/views/{$name}.view.php";
    }


    public static function redirect($path)
    {
        header("Location: /{$path}");
        exit();
    }

    public static function checkLogin()
    {
        if (!isset($_SESSION["User_id"])) {
            echo '<script language="javascript">';
            echo 'alert("Please Login before accessing this page");';
            echo 'window.location = "home"';
            echo '</script>';
        }
    }
}
