<?php
require_once "app/models/Card.php";
class AdvancedResearchController
{
    public function index()
    {
        return Helper::view("AdvancedResearch");
    }

    /**
     * Method will change with API integration
     * For the moment allows only name search for demo
     */
    public function parseSearchForm()
    {
        $searchStmt = "";
        if($_SERVER['REQUEST_METHOD']==='GET')
        {
            if(count($_GET) > 0)
            {
                if(isset($_GET['cardName']))
                {
                    //Method in model
                    if($_GET['cardName'] != null || $_GET['cardName'] != " ")
                    {

                        $searchStmt .='name LIKE :name';
                    }
                }
            }
        }

        $params = [
            "search" => $searchStmt,
            "binding" => [
                "name" => [$_GET['cardName'] , PDO::PARAM_STR]
            ]
            ];
        $cards = Card::searchCards($params);
        return Helper::view("ShowCards", ["cards" => $cards]);
    }

    public function show()
    {
        if(isset($_GET["id"]) && ctype_digit($_GET["id"]))
        {
            $card = Card::fetchId($_GET["id"]);

            if($card == null)
            {
                // raising an exception maybe not the best solution
                throw new Exception("CARD NOT FOUND.", 1);
            }
        }
        else {
            throw new Exception("CARD NOT FOUND.", 1);
        }

        return Helper::view("ShowCard",[
                'card' => $card,
            ]);
    }
    
}