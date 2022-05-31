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
    private $id;    //int(11)
    private $name;    //varchar(64)	
    private $cost;    //int(11)	
    private $type;    //varchar(32)	
    private $description;    //varchar(200)	
    private $extension;    //varchar(64)
    private $color = array();

    const white = 1;
    const blue = 2;
    const black = 3;
    const red = 4;
    const green = 5;
    const colorless = 6;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
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
    public function getColor()
    {
        return $this->color;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setExtension($extension)
    {
        $this->extension = $extension;
    }
    public function setColor($c)
    {
        array_push($this->color, $c);
    }

    /***********************
        Public Methods
     ***********************/
    public function asHTMLFlexBoxItem()
    {


        $str = '';
        $str .= '<p><label class="card_id"> Card id: ' . urlencode($this->id) . '</label></p>';
        $str .= "<a class=\"card_name\" href=\"card?id=" . urlencode($this->id) . "\"> Card name: " . htmlentities($this->name) . "</a>";
        $str .= '<p><label class="card_color"> Color identity: ';
        $assoc = Card::fetchColor($this->id);
        foreach ($assoc as $c) {
            $str .= htmlentities($c) . " ";
        }
        $str .= '</label></p>';
        $str .= '<p><label class="card_cost"> CMC: ' . htmlentities($this->cost) . '</label></p>';
        $str .= '<p><label class="card_type"> Type: ' . htmlentities($this->type) . '</label></p>';
        $str .= '<p><label class="card_description"> Description: ' . htmlentities($this->description) . '</label></p>';
        $str .= '<p><label class="card_extension"> Extension: ' . htmlentities($this->extension) . '</label></p>';
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

    public static function fetchIdByName($name)
    {
        return Card::getIdByName("cards", $name);
    }

    public static function fetchName($card_id)
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
                $statement->bindParam(":" . $key, $value[0], $value[1]);
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
                $statement->bindParam(":" . $key, $value[0], $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function save()
    {

        $values_card = [
            "name" => $this->name,
            "cost" => $this->cost,
            "type" => $this->type,
            "description" => $this->description,
            "extension" => $this->extension,
        ];

        Card::create("cards", $values_card);
    }
    public function saveColor($color)
    {
        $values_color = [
            "card_id" => $this->id,
        ];
        switch ($color) {
            case "white":
                $values_color["color_id"] = Card::white;
                break;
            case "blue":
                $values_color["color_id"] = Card::blue;
                break;
            case "black":
                $values_color["color_id"] = Card::black;
                break;
            case "red":
                $values_color["color_id"] = Card::red;
                break;
            case "green":
                $values_color["color_id"] = Card::green;
                break;
            case "colorless":
                $values_color["color_id"] = Card::colorless;
                break;
            default:
                $values_color["color_id"] = Card::colorless;
                break;
        }

        Card::create("cards_color", $values_color);
    }
}
