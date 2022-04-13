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
        Public Methods
    ***********************/
    public function asHTMLFlexBoxItem()
    {
        $str = '';
        $str .= '<div id="card'.$this->id.'" class="card>';
        $str .= '<p><label class="card_id">'. urlencode($this->id). '</label></p>';
        $str .= '<p><label class="card_name">'. htmlentities($this->name). '</label></p>';
        $str .= '<p><label class="card_color">'. htmlentities($this->color). '</label></p>';
        $str .= '<p><label class="card_cost">'. htmlentities($this->cost). '</label></p>';
        $str .= '<p><label class="card_type">'. htmlentities($this->type). '</label></p>';
        $str .= '<p><label class="card_description">'. htmlentities($this->description). '</label></p>';
        $str .= '<p><label class="card_extension">'. htmlentities($this->extension). '</label></p>';
        $str .= '</div>';
        return $str;
    }

    public static function fetchAll()
    {
        return TestCard::readAll("test_card");
        //Will implement a filter when user options are available
    }

    public static function fetchAllOrderBy($column)
    {
        return TestCard::readAllOrderBy("test_card", $column);
    }

    public static function fetchId($id)
    {
        return TestCard::readById("test_card", $id);
    }

    public static function searchCards($params)
    {
        return TestCard::search("test_card", $params);
        //return TestCard::readByName("test_card","Chandra, Torch of defiance")
    }
    
    
}