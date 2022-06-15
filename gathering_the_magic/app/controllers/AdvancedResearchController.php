<?php
require_once "app/models/Card.php";
class AdvancedResearchController
{
    public function index()
    {
        $extensions = Card::fetchExtension();
        $colors = Card::fetchAllColor();
        return Helper::view("AdvancedResearch", ["extensions" => $extensions, "colors" => $colors]);
    }


    public static function checkColors(&$searchStmt, &$searchBinding, &$first)
    {
        $searchStmtColor = '';
        $firstColor = true;

        AdvancedResearchController::checkColor('white', Card::white, $searchStmtColor, $firstColor);
        AdvancedResearchController::checkColor('blue', Card::blue, $searchStmtColor, $firstColor);
        AdvancedResearchController::checkColor('black', Card::black, $searchStmtColor, $firstColor);
        AdvancedResearchController::checkColor('red', Card::red, $searchStmtColor, $firstColor);
        AdvancedResearchController::checkColor('green', Card::green, $searchStmtColor, $firstColor);
        AdvancedResearchController::checkColor('colorless', Card::colorless, $searchStmtColor, $firstColor);

        //With the selected colors, fetchIdFromColor will give all the id of the card who are the right colors
        $params = [
            "search" => $searchStmtColor //,
        ];

        if (!empty($searchStmtColor)) {
            if (!$first) {
                $searchStmt .= ' AND ';
            }

            $CardIdColor = Card::fetchIdFromColor($params); //ça nous renvoie toute les ids de cartes qui ont ces couleurs

            $searchStmt .= ' ( ';
            $firstColor = true;
            foreach ($CardIdColor as $card_id) {

                if (!$firstColor) {
                    $searchStmt .= ' OR ';
                }

                $firstColor = false;
                $first = false;
                $id = 'id' . $card_id;
                $searchStmt .= 'id = :' . $id;


                $searchBinding[$id] = [$card_id, PDO::PARAM_INT];
            }
            $searchStmt .= ' ) ';
        }
    }
    public static function checkColor($name, $id, &$searchStmtColor, &$firstColor)
    {
        if (isset($_GET["{$name}"])) {
            if (!$firstColor) {
                $searchStmtColor .= ' OR ';
            }
            $firstColor = false;
            $searchStmtColor .= ' color_id = ' . $id . " ";
        }
    }

    public static function check($name, $search, $param, &$searchStmt, &$searchBinding, &$first)
    {
        if (isset($_GET["{$name}"])) {
            //Method in model
            if (!Card::checkPercent($_GET["{$name}"])) {
                if (!empty($_GET["{$name}"]) || $name == "description") //Even if the description is empty we want to check
                {
                    if (!$first) {
                        $searchStmt .= ' AND ';
                    }
                    $searchStmt .= $search . ' LIKE :' . $search;
                    $first = false;

                    if ($name != "extension") {
                        $searchBinding["{$search}"] = [$_GET["{$name}"], $param];
                    } else {
                        $searchBinding["{$search}"] = [str_replace('_', ' ', $_GET["{$name}"]), $param];
                    }
                }
            }
        }
    }


    /**
     * Method will change with API integration
     * For the moment allows only name search for demo
     */
    public function parseSearchForm()
    {
        $searchBinding = [];
        $searchStmt = '';
        $first = true;
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (count($_GET) > 0) {

                //NAME
                $this->check('cardName', 'name', PDO::PARAM_STR, $searchStmt, $searchBinding, $first);

                //TYPE    
                $this->check('cardType', 'type', PDO::PARAM_STR, $searchStmt, $searchBinding, $first);

                //EXTENSION
                $this->check('extension', 'extension', PDO::PARAM_STR, $searchStmt, $searchBinding, $first);

                //COLORS
                $this->checkColors($searchStmt, $searchBinding, $first);

                //DESCRIPTION
                $this->check('description', 'description', PDO::PARAM_STR, $searchStmt, $searchBinding, $first);
            }
        }

        $params = [
            "search" => $searchStmt,
            "binding" => $searchBinding
        ];

        $cards = Card::searchCards($params);
        return Helper::view("ShowCards", ["cards" => $cards]);
    }


    public function show()
    {
        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {
            $card = Card::fetchId($_GET["id"]);

            if ($card == null) {
                // raising an exception maybe not the best solution
                throw new Exception("CARD NOT FOUND.", 1);
            }
        } else {
            throw new Exception("CARD NOT FOUND.", 1);
        }

        return Helper::view("ShowCard", [
            'card' => $card,
        ]);
    }
}
