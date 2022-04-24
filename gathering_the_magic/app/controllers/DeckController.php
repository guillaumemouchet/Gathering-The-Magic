<?php

class DeckController
{
    public function index()
    {
        return Helper::view("Decks");
    }
}