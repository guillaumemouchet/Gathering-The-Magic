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

        $str = '<div class="card mx-1">';
        $str .= '<div class="row g-0">';
        $str .= '<div class="col-mx-5">';
        $str .= '<img src="public/images/Card.jpg" class="img-fluid rounded-start" alt="Blank Card">';
        $str .= '</div>';
        $str .= '<div class="card-body">';
        //$str .= '<h5 class="card-title">Card id: <label class="card_id">' . urlencode($this->id) . '</label></h5>';
        $str .= '<h5 class="card-text"> Card name: <a class="card_name" href="card?id=' . urlencode($this->id) . '">' . htmlentities($this->name) . "</a></h5>";
        $str .= '<p class="card-text">Color identity: ';
        $assoc = Card::fetchColor($this->id);
        foreach ($assoc as $c) {
            $str .= "<a>".htmlentities($c) . " ";
        }
        $str .= '</a></p>';
        $str .= '<p class="card-text">CMC: <a>' . htmlentities($this->cost) . '</a></p>';
        $str .= '<p class="card-text">Type: <a>' . htmlentities($this->type) . '</a></p>';
        $str .= '<p class="card-text">Description: </p>';
        $str .= '<p>' . htmlentities($this->description) . '</p>';
        $str .= '<p class="card-text">Extension: <a>' . htmlentities($this->extension) . '</a></p>';
        $str .= '</div>';
        $str .= '  </div>';
        $str .= ' </div>';
        $str .= ' </div>';


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

    public static function fetchByDate($date)
    {

        $params = [
            "binding" => [
                "timestamp" => [$date, PDO::PARAM_STR],
            ]
        ];
        $dbh = App::get('dbh');
        $request = "SELECT * FROM cards WHERE timestamp > :timestamp";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $statement->bindParam(":" . $key, $value[0], $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, get_called_class());
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
    public static function fetchAllColor()
    {
        $dbh = App::get('dbh');
        $request = "SELECT color.name FROM color;";
        $statement = $dbh->prepare($request);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function fetchIdFromColor($params)
    {

        $dbh = App::get('dbh');
        $request = "SELECT card_id FROM cards_color WHERE";
        foreach ($params as $key => $value) {
            if ($key != "binding") {
                $request .= ' ' . $value;
            }
        }
        $request = $request . ";";
        $statement = $dbh->prepare($request);

        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }


    public static function fetchExtension()
    {
        $dbh = App::get('dbh');
        $request = "SELECT DISTINCT extension FROM cards";
        $statement = $dbh->prepare($request);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_COLUMN);
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
