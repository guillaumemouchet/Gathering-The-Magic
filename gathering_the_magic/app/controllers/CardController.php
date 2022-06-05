<?php
require_once "app/models/Card.php";
require_once "app/models/Collection.php";
class CardController
{
    public function index()
    {
        $colors = Card::fetchAllColor();
        return Helper::view("Card", ["colors" => $colors]);
        exit();
    }

    public static function controlText($name)
    {
        if (isset($name)) {
            if (!ctype_space($name) && !empty($name)) {
                if (Card::checkPercent($name)) {
                    return false;
                }
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function parseNewCard()
    {
        $card = new Card();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (count($_POST) > 0) {

                //CARDNAME
                if (CardController::controlText($_POST['cardName'])) {
                    $card->setName($_POST['cardName']);
                } else {
                    //ERREUR -> retour en arrière avec le même form
                    echo "Incorrect input";
                    return Helper::view("card");
                    exit();
                }

                //CARDTYPE
                if (CardController::controlText($_POST['cardType'])) {
                    $card->setType($_POST['cardType']);
                } else {
                    //ERREUR -> retour en arrière avec le même form
                    echo "Incorrect input";
                    return Helper::view("card");
                    exit();
                }

                //EXTENSION
                if (CardController::controlText($_POST['extension'])) {
                    $card->setExtension($_POST['extension']);
                } else {
                    //ERREUR -> retour en arrière avec le même form
                    echo "Incorrect input";
                    return Helper::view("card");
                    exit();
                }


                //CMC
                if (isset($_POST['cmc'])) {
                    if (ctype_digit($_POST['cmc'])) {
                        $card->setCost($_POST['cmc']);
                    }
                }

                //COLORS

                if (isset($_POST['white'])) {
                    $card->setColor($_POST['white']);
                }
                if (isset($_POST['blue'])) {
                    $card->setColor($_POST['blue']);
                }
                if (isset($_POST['black'])) {
                    $card->setColor($_POST['black']);
                }
                if (isset($_POST['red'])) {
                    $card->setColor($_POST['red']);
                }
                if (isset($_POST['green'])) {
                    $card->setColor($_POST['green']);
                }

                if ($this->controlText($_POST['description'])) {
                    $card->setDescription($_POST['description']);
                }

                $card->save();
                $id = Card::fetchIdByName($card->getName())['id'];
                $card->setId($id);
                foreach ($card->getColor() as $c) {
                    $card->saveColor($c);
                }

                $array = [$card];
                return Helper::view("ShowCard", ["card" => $array]);
                exit();
            } else {
                return Helper::view("CardView");
                exit();
            }
        }
    }
}
