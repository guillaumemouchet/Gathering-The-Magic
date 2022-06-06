<nav>

        <a><?=isset($_SESSION['Username']) ? $_SESSION['Username'] : "No one is logged in" ?></a>
        <a href="home">Home</a>
        <a href="advanced_research">Advanced Research</a>
        <a href="collection">Collection</a>
        <a href="extensions">Extensions</a>
        <a href="decks">Decks</a>
        <a href="new_cards">New Cards</a>
        <?php
        if(sizeof($_SESSION["newcards"])>0)
        {?>
                <a><img src="public/images/idea.png" width="14" 
     height="14" alt="New Card Added"/></a>
<?php
        }else
        {?>
                <a><img src="public/images/bulb.png" width="14" 
     height="14" alt="No New Card Added"/></a>
<?php
        }
        ?>
        

</nav>