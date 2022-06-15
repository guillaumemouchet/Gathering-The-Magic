<nav>
        <a id="nav-text"><?=isset($_SESSION['Username']) ? $_SESSION['Username'] : "No one is logged in" ?></a>

        <a id="nav-text" href="home">Home</a>
        <a id="nav-text" href="advanced_research">Advanced Research</a>
        <a id="nav-text" href="collection">Collection</a>
        <a id="nav-text" href="extensions">Extensions</a>
        <a id="nav-text" href="decks">Decks</a>
        <a id="nav-text" href="new_cards">New Cards</a>
        <?php
        if(sizeof($_SESSION["newcards"])>0)
        {?>
                <a id="nav-text"><img src="public/images/idea.png" width="14" 
     height="14" alt="New Card Added"/></a>
<?php
        }else
        {?>
                <a id="nav-text"><img src="public/images/bulb.png" width="14" 
     height="14" alt="No New Card Added"/></a>
<?php
        }
        ?>
        

</nav>