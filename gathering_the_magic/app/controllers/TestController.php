<?php

require_once "app/models/unit_test.php";
require_once "UserController.php";
class TestController
{
    public function index()
    {
        UserController::logout();
        UnitTest::testWrongAuthentification();
        UnitTest::testCorrectAuthentification();
        return Helper::view("UnitTest");
    }
}