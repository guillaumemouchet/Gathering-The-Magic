<?php
require_once "app/models/Card.php";
class CardController
{
    public function index()
    {
        return Helper::view("Card");
        exit();
    }
    
    public static function controlText($name)
    {
        if(isset($name))
        {
            //Method in model
            if($name != null || $name != " ")
            {
                if(Card::checkPercent($name))
                {
                    return 0;
                }
                return 1;
            } 
        }
    }

    public function parseNewCard()
    {
        echo "BONJOUR";
        $card = new Card();
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
           if(count($_POST) > 0)
           {
               //CARDNAME
               if($this->controlText($_POST['cardName']))
               {
                   $card->name = $_POST['cardName'];
               }
               else
               {
                   //ERREUR -> retour en arrière avec le même form
                   exit();
               }

                //CARDTYPE
                if($this->controlText($_POST['cardType']))
                {
                    $card->type = $_POST['cardType'];
                }
                else
                {
                    //ERREUR -> retour en arrière avec le même form
                    exit();
                }

                //EXTENSION
                if($this->controlText($_POST['extension']))
                {
                    $card->extension = $_POST['extension'];
                }
                else
                {
                    //ERREUR -> retour en arrière avec le même form
                    exit();
                }


                //CMC
                if(isset($_POST['cmc']))
                {
                //Method in model
                    if(ctype_digit($_POST['cmc']))
                    {
                        $card->cost = $_POST['cmc'];   
                    } 
                }

                //COLORS

                if(isset($_POST['white']))
                {
                //Method in model //???

                     $card->setColor($_POST['white']);   
                    
                }
                
            }  
        }
        
    }

}