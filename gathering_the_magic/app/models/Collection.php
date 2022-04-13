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
        Collection::readById("user_collection", $id);
    }

    public static function fetchAll($id)
    {
        return Collection::readAll("user_collection");
    }

    public function save()
    {
        $values_collection_user = [
            "user_id" => 1, //In the future will have to change to $_SESSION
            "card_id" => $this->card_id,
            "quantity" => $this->quantity,
            "owned" => $this->owned
        ];
        $values_collection = [
            "id" => 1
        ];
        echo "Saving into c \n";
        Collection::create("collection", $values_collection);
        echo "Saving into u_c \n";
        Collection::create("user_collection", $values_collection_user);

    }

    public function asHTMLFlexBoxItem()
    {
        $str = '';
        $str .= '<div id="card'.$this->card_id.'" class="card>';
        $str .= "<a class=\"id\" href=\"card?id=" . urlencode($this->card_id) . "\">" . htmlentities($this->card_id) . "</a>";
        //$str .= "<a class=\"card_id\" href=\"card?id=". urlencode($this->card_id)."\">". htmlentities($this->card_id). "</a>";
        $str .= '<p><label class="quantity">Quantity: '. htmlentities($this->quantity). '</label></p>';
        $str .= '<p><label class="owned">Owned: '. htmlentities($this->owned). '</label></p>';
        $str .= '</div>';
        return $str;
    }
    
}