<?php
require_once "app/models/Card.php";
class NewCardsController
{
    public function index()
    {
        $cards = Card::fetchByDate(time());
        return Helper::view("NewCards", ["cards" => $cards]);
    }
}