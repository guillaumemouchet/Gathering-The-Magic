<?php

/**
 * Collection class contains a user's cards (id only)
 */
class Collection extends Model
{
    /***********************
            Attributes
    ***********************/
    private $user_id;
    private $card_id;
    private $quantity;
    private $owned;


    /***********************
            Getters
     ***********************/
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getCardId()
    {
        return $this->card_id;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function getOwned()
    {
        return $this->owned;
    }
    /***********************
            Setters
    ***********************/
    public function setUserId($id)
    {
        $this->user_id = $id;
    }
    public function setCardId($id)
    {
        $this->card_id = $id;
    }
    public function setQuantity($qty)
    {
        $this->quantity = $qty;
    }
    public function setOwned($owned)
    {
        $this->owned = $owned;
    }

    /***********************
        Public Methods
    ***********************/

    public static function fetchById($id)
    {
        return Collection::readById("user_collection", $id);
    }

    public static function fetchAll($id)
    {
        return Collection::readAll("user_collection");
    }

    public static function isIn ($card_id, $user_id, $owned)
    {
        $params = [
            "search" => "card_id = :card_id AND user_id = :user_id AND owned = :owned",
            "binding" => [
                "card_id" => [$card_id, PDO::PARAM_INT],
                "user_id" => [$user_id, PDO::PARAM_INT],
                "owned" => [$owned, PDO::PARAM_STR]
            ]
        ];
        return Collection::exists("user_collection", $params);
    }

    public static function fetchQuantity ($card_id, $user_id, $owned)
    {
        $params = [
            "binding" => [
                "card_id" => [$card_id, PDO::PARAM_INT],
                "user_id" => [$user_id, PDO::PARAM_INT],
                "owned" => [$owned, PDO::PARAM_STR]
            ]
        ];
        $dbh = App::get('dbh');
        $request = "SELECT quantity FROM user_collection WHERE card_id = :card_id AND user_id = :user_id AND owned = :owned;";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $statement->bindParam(":".$key, $value[0], $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $values_collection_user = [
            "user_id" => 1, //In the future will have to change to $_SESSION
            "card_id" => $this->card_id,
            "quantity" => $this->quantity,
            "owned" => $this->owned,
        ];
        $values_collection = [
            "id" => $this->card_id,
        ];
        echo "Saving into c \n";
        try{
            Collection::create("collection", $values_collection);
        }
        catch(Exception $e)
        {
            echo "Card already in DB";
        }
        echo "Saving into u_c \n";
        Collection::create("user_collection", $values_collection_user);
    }

    public static function updateQuantity($params)
    {
        $dbh = App::get('dbh');
        $request = "UPDATE user_collection SET quantity = :quantity WHERE card_id=:card_id AND user_id=:user_id AND owned=:owned;";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $statement->bindParam(":".$key, $value[0], $value[1]);
            }
        };
        $statement->execute();
        echo "Quantity updated";
    }

    public function asHTMLFlexBoxItem()
    {
        $str = '';
        $str .= '<div id="card'.$this->card_id.'" class="card>';
        
        $str .= '<p><label class="quantity">Quantity: '. htmlentities($this->quantity). '</label></p>';
        $str .= '<p><label class="owned">Owned: '. htmlentities($this->owned). '</label></p>';
        $str .= "<p><a class=\"card_name\" href=\"CardCollection?id=". urlencode($this->card_id)."\">". urlencode($this->card_id). "</a></p>";

        $str .= '</div>';

        return $str;
    }

    public function show()
    {
        if(isset($_GET["id"]) && ctype_digit($_GET["id"]))
        {
            $card = TestCard::fetchId($_GET["id"]);

            if($card == null)
            {
                // raising an exception maybe not the best solution
                throw new Exception("CARD NOT FOUND.", 1);
            }
        }
        else {
            throw new Exception("CARD NOT FOUND.", 1);
        }

        return Helper::view("CardCollection",[
                'card' => $card,
            ]);
    }
    
    
}