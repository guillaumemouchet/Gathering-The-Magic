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
        $card = new Card();
        if($_SERVER['REQUEST_METHOD']==='POST')
        {
           if(count($_POST) > 0)
           {
               
               //CARDNAME
               if($this->controlText($_POST['cardName']))
               {
                   //Magic setter ;)
                   $card->setName($_POST['cardName']);
               }
               else
               {
                   //ERREUR -> retour en arrière avec le même form
                   exit();
               }

                //CARDTYPE
                if($this->controlText($_POST['cardType']))
                {
                    $card->setType($_POST['cardType']);
                }
                else
                {
                    //ERREUR -> retour en arrière avec le même form
                    exit();
                }

                //EXTENSION
                if($this->controlText($_POST['extension']))
                {
                    $card->setExtension($_POST['extension']);
                }
                else
                {
                    //ERREUR -> retour en arrière avec le même form
                    exit();
                }


                //CMC
                if(isset($_POST['cmc']))
                {
                    if(ctype_digit($_POST['cmc']))
                    {
                        $card->setCost($_POST['cmc']);   
                    } 
                }

                //COLORS

                if(isset($_POST['white']))
                {
                    echo $_POST['white'];
                    $card->setColor($_POST['white']);   
                }
                if(isset($_POST['blue']))
                {
                    $card->setColor($_POST['blue']);   
                }
                if(isset($_POST['black']))
                {
                    $card->setColor($_POST['black']);   
                }
                if(isset($_POST['red']))
                {
                    $card->setColor($_POST['red']);   
                }
                if(isset($_POST['green']))
                {
                    $card->setColor($_POST['green']);   
                }
                
                if($this->controlText($_POST['description']))
                {
                    //Magic setter ;)
                    $card->setDescription($_POST['description']);
                }
                
                $card->save();
                $id = Card::fetchIdByName($card->getName())['id'];
                $card->setId($id);
                foreach($card->getColor() as $c)
                {
                    echo "NewColor: ".$c."end";
                    $card->saveColor($c); 
                }
                
                echo "Card added succesfully";
                exit();

            }  
        }
        
    }

}