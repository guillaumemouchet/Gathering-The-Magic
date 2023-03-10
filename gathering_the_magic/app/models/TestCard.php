<?php

/**
 * Test Card Class
 * This class is used to test the website's 
 * functions before integrating the API
 */
class TestCard extends Model
{
    /***********************
            Attributes
     ***********************/
    private $id;    //int(11)
    private $name;    //varchar(64)	
    private $color;    //enum('W','U','B','R','G','S','C','P','X','T')	
    private $cost;    //int(11)	
    private $type;    //varchar(32)	
    private $description;    //varchar(200)	
    private $extension;    //varchar(64)


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
        $str .= '<div id="card' . $this->id . '" class="card>';
        $str .= '<p><label class="card_id">' . urlencode($this->id) . '</label></p>';
        $str .= "<a class=\"card_name\" href=\"card?id=" . urlencode($this->id) . "\">" . htmlentities($this->name) . "</a>";

        $str .= '<p><label class="card_color">' . htmlentities($this->color) . '</label></p>';
        $str .= '<p><label class="card_cost">' . htmlentities($this->cost) . '</label></p>';
        $str .= '<p><label class="card_type">' . htmlentities($this->type) . '</label></p>';
        $str .= '<p><label class="card_description">' . htmlentities($this->description) . '</label></p>';
        $str .= '<p><label class="card_extension">' . htmlentities($this->extension) . '</label></p>';
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

    public static function fetchName($card_id)
    {
        $params = [
            "binding" => [
                "id" => [$card_id, PDO::PARAM_INT],
            ]
        ];
        $dbh = App::get('dbh');
        $request = "SELECT name FROM test_card WHERE id = :id;";
        $statement = $dbh->prepare($request);
        if (isset($params["binding"])) {
            foreach ($params["binding"] as $key => $value) {
                $statement->bindParam(":" . $key, $value[0], $value[1]);
            }
        }
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
