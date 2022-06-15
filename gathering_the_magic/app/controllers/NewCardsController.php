<?php
require_once "app/models/Card.php";
class NewCardsController
{
    public function index()
    {
        $_SESSION["last_timestamp"] = time(); //TODO
        $cards = Card::fetchByDate($_SESSION["last_timestamp"]);
        return Helper::view("NewCards", ["cards" => $cards]);
    }
}
