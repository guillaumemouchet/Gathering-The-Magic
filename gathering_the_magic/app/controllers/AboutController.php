<?php

class AboutController
{
    public function index()
    {
        return Helper::view("About");
        exit();
    }
}