<?php
require_once "app/models/Card.php";
class IndexController
{
    public function index()
    {
        return Helper::view("index");
    }
}
