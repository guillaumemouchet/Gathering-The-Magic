<?php
require_once "app/models/Collection.php";
require_once "app/models/Card.php";
class CollectionController
{
    public function index()
    {
        if (isset($_SESSION["User_id"])) //pour éviter l'affichage des erreurs de fetch
        {
            $collection = Collection::fetchAll($_SESSION["User_id"]);
            return Helper::view("Collection", ["collection" => $collection]);
        }else
        {
            return Helper::view("Collection");
        }
    
    }

    public function parseAddCard()
    {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //New condition needed when user is implemented
            if (isset($_POST['card_id'])) {
                $collection = new Collection;
                $collection->setCardId($_POST['card_id']);
                if (isset($_POST['possession'])) {
                    if ($_POST['possession'] == "owned") {
                        $collection->setOwned('true');
                    } else {
                        $collection->setOwned('false');
                    }
                }
                $collection->setUserId($_SESSION["User_id"]);

                //Looking if card is already in collection
                try {
                    if (isset($_POST['quantity'])) {
                        $collection->setQuantity($_POST['quantity']);
                    }

                    $collection->save();
                    $_SESSION['message'] = "Card added succesfully to collection";
                    $collection = Collection::fetchAll($_SESSION["User_id"]);
                    Helper::redirect("collection");
                    return Helper::view("Collection", ["collection" => $collection]);
                    exit();
                }
                //Otherwise updates the cards quantity
                catch (Exception $e) {
                    $qty = Collection::fetchQuantity($collection->getCardId(), $collection->getUserId(), $collection->getOwned());
                    $qty = $qty['quantity'] + $_POST['quantity'];
                    if (isset($_POST['quantity'])) {
                        $params = [
                            "binding" => [
                                "quantity" => [$qty, PDO::PARAM_INT],
                                "card_id" => [$collection->getCardId(), PDO::PARAM_INT],
                                "user_id" => [$collection->getUserId(), PDO::PARAM_INT],
                                "owned" => [$collection->getOwned(), PDO::PARAM_STR]
                            ]
                        ];
                        Collection::updateQuantity($params);
                        $_SESSION['message'] = "Card already in collection, quantity updated";
                        $collection = Collection::fetchAll($_SESSION["User_id"]);
                        Helper::redirect("collection");
                        return Helper::view("Collection", ["collection" => $collection]);
                        exit();
                    }
                }
            } else {
                $_SESSION['message'] = "Error";

                Helper::redirect("collection");
                $collection = Collection::fetchAll($_SESSION["User_id"]);
                return Helper::view("Collection", ["collection" => $collection]);
                exit();
            }
        }
    }

    /**
     * For the moment this method only implemets qty changes, will add in future possibility to switch from wishlist to owned
     */
    public static function parseUpdateCard()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $qty = Collection::fetchQuantity($_POST['card_id'], $_SESSION["User_id"], $_POST['owned']);


            if (isset($_POST['reduce'])) {
                $qty = $qty['quantity'] - $_POST['quantity'];
            } else {
                $qty = $qty['quantity'] + $_POST['quantity'];
            }
            if ($qty <= 0) {
                CollectionController::parseRemoveCard();
                exit();
            }
            if (isset($_POST['quantity'])) {

                $params = [
                    "binding" => [
                        "quantity" => [$qty, PDO::PARAM_INT],
                        "card_id" => [$_POST['card_id'], PDO::PARAM_INT],
                        "user_id" => [$_SESSION["User_id"], PDO::PARAM_INT],
                        "owned" => [$_POST['owned'], PDO::PARAM_STR]
                    ]
                ];
                Collection::updateQuantity($params);
                $_SESSION['message'] = "Card quantity changed succesfully";
                $collection = Collection::fetchAll($_SESSION["User_id"]);
                return Helper::view("Collection", ["collection" => $collection]);
                exit();
            }
        }
    }

    public static function parseRemoveCard()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $params = [
                "binding" => [
                    "card_id" => [$_POST['card_id'], PDO::PARAM_INT],
                    "user_id" => [$_SESSION["User_id"], PDO::PARAM_INT],
                    "owned" => [$_POST['owned'], PDO::PARAM_STR]
                ]
            ];
            Collection::remove($params);
            $_SESSION['message'] = "Card removed succesfully from collection";
            $collection = Collection::fetchAll($_SESSION["User_id"]);
            return Helper::view("Collection", ["collection" => $collection]);
            exit();
        } else {
            $collection = Collection::fetchAll($_SESSION["User_id"]);
            return Helper::view("Collection", ["collection" => $collection]);
            exit();
        }
    }

    public function show()
    {
        if (isset($_GET["id"]) && ctype_digit($_GET["id"])) {

            $card = Card::fetchId($_GET["id"]);
            if ($card == null) {
                // raising an exception maybe not the best solution
                $_SESSION["message"] = "CARD NOT FOUND";
                //throw new Exception("CARD NOT FOUND.", 1);
            }
        } else {
            $_SESSION["message"] = "CARD NOT FOUND";

            //throw new Exception("CARD NOT FOUND.", 1);
        }

        return Helper::view("CardCollection", [
            'card' => $card,
        ]);
    }
}
