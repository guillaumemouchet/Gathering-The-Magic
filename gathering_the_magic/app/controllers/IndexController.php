<?php
require_once "app/models/TestCard.php";
class IndexController
{
    public function index()
    {
        $cards = TestCard::fetchAll();
        return Helper::view("index", [
            "cards" => $cards
        ]);
    }
}