<?php
require_once "app/models/Card.php";
class NewCardsController
{
    public function index()
    {
        return Helper::view("NewCards");
    }
}
