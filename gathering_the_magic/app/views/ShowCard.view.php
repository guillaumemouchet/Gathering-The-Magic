<?php
    $title = "Search result";
    require('partials/header.php')
?>
<h1><?php echo $card[0]->getName(); ?></h1>


<?php echo $card[0]->asHTMLFlexBoxItem();//echo "<img src='./Card.jpg' alt='Blank Card'/>";	?>
				<img src="public/images/Card.jpg" alt="Blank Card"/>
				<hr>
<form method="post" action="parse_add_card">
    <label>How many cards do you want to add (between 1 and 100) <input type="number" id="quantity" name="quantity" min="1" max="100"></label>
    <label>
        <label>Owned:<input type="radio" id="owned" name="possession" value="owned" checked></label>
        <label>Wishlist:<input type="radio" id="wishlist" name="possession" value="wishlist"></label>
    </label>
    <input type="hidden" id="card_id" name="card_id" value="<?php echo $card[0]->getId();?>">
    <input type="hidden" id="user_id" name="user_id" value="1">
    <input type="submit" name="add" value="Add to Collection !"/>
</form>
				
				
<?php require('partials/footer.php') ?>