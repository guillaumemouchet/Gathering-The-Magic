<?php

/**
 * Test Card Class
 * This class is used to test the website's 
 * functions before integrating the API
 */
class Card extends Model
{
    /***********************
            Attributes
    ***********************/
    private $id;	//int(11)
    private $name;	//varchar(64)	
    private $color;
    private $cost;	//int(11)	
    private $type;	//varchar(32)	
    private $description;	//varchar(200)	
    private $extension;	//varchar(64)


    /***********************
            Getters
     ***********************/
    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getCost()
    {
        return $this->cost;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getExtension()
    {
        return $this->extension;
    }

    
    /***********************
        Public Methods
    ***********************/
    public function asHTMLFlexBoxItem()
    {


        $str = '';
        $str .= '<p><label class="card_id"> Card id: '. urlencode($this->id). '</label></p>';

        $str .= '<label class="card_color">';

       

        $str .= '<p><label class="card_color"> Color identity: ';
        $assoc = Card::fetchColor($this->id);
        foreach($assoc as $c)
        {
             $str .= htmlentities($c). " ";
        }
        $str .= '</label></p>';
        $str .= '<p><label class="card_cost"> CMC: '. htmlentities($this->cost). '</label></p>';
        $str .= '<p><label class="card_type"> Type: '. htmlentities($this->type). '</label></p>';
        $str .= '<p><label class="card_description"> Description: '. htmlentities($this->description). '</label></p>';
        $str .= '<p><label class="card_extension"> Extension: '. htmlentities($this->extension). '</label></p>';
        $str .= '</div>';
        return $str;
    }

    public static function fetchAll()
    {
        return Card::readAll("cards");
        //Will implement a filter when user options are available
    }

    public static function fetchAllOrderBy($column)
    {
        return Card::readAllOrderBy("cards", $column);
    }

    public static function fetchId($id)
    {
        return Card::readById("cards", $id);
    }

    public static function searchCards($params)
    {
        return Card::search("cards", $params);
        //return Card::readByName("cards","Chandra, Torch of defiance")
    }
    
    public static function fetchName ($card_id)
    {
        $params = [
            "binding" => [
                "id" => [$card_id, PDO::PARAM_INT],
            ]
        ];
        $dbh = App::get('dbh');
        $request = "SELECT name FROM cards WHERE id = :id;";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $statement->bindParam(":".$key, $value[0], $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function fetchColor($card_id)
    {
        $params = [
            "binding" => [
                "id" => [$card_id, PDO::PARAM_INT],
            ]
        ];
        $dbh = App::get('dbh');
        $request = "SELECT color.name FROM cards_color INNER JOIN color ON cards_color.color_id = color.id WHERE card_id =:id";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $statement->bindParam(":".$key, $value[0], $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

}