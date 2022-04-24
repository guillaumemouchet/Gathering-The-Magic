<?php
require_once "app/models/TestCard.php";
class IndexController
{
    public function index()
    {
        return Helper::view("index");
    }
}