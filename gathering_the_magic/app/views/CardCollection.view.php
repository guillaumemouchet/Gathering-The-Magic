<?php
    $title = "Search result";
    require('partials/header.php')
?>
<h1><?php echo $card[0]->getName(); ?></h1>


<?php echo $card[0]->asHTMLFlexBoxItem();//echo "<img src='./Card.jpg' alt='Blank Card'/>";	?>
				<img src="public/images/Card.jpg" alt="Blank Card"/>
				<hr>
<form method="post" >
    <label>Add/remove (between -100 and 100) <input type="number" id="quantity" name="quantity" min="-100" max="100"></label>
    
    <input type="hidden" id="card_id" name="card_id" value="<?php echo htmlentities($card[0]->getId());?>">
    <input type="hidden" id="user_id" name="user_id" value="1">
    <input type="hidden" id="owned" name="owned" value="<?php echo htmlentities($_GET["owned"]);?>">
    <input type="submit" name="update" value="Update collection" formaction="parse_update_card"/>
    <input type="submit" name="remove" value="Remove from collection !" formaction="parse_remove_card"/>

</form>
				
				
<?php require('partials/footer.php') ?>