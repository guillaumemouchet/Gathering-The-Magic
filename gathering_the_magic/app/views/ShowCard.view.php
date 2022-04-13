<?php
    $title = "Search result";
    require('partials/header.php')
?>
<h1><?php echo $card[0]->getName(); ?></h1>


<?php echo $card[0]->asHTMLFlexBoxItem();//echo "<img src='./Card.jpg' alt='Blank Card'/>";	?>
				<img src="public/images/Card.jpg" alt="Blank Card"/>
				<hr>
<form method="post" action="parse_add_card">
    <label>Quantity: <input type="range" id="quantity" name="quantity" min="1" max="10" step="1" list="tickmarks"/></label>
    <!-- Option not fully supported https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/range  -->
    <!-- Firefox does not display ticks, will change quantity input in future -->
    <datalist id="tickmarks">
        <option value="1" label="1"></option>
        <option value="2"></option>
        <option value="3"></option>
        <option value="4"></option>
        <option value="5" label="5"></option>
        <option value="6"></option>
        <option value="7"></option>
        <option value="8"></option>
        <option value="9"></option>
        <option value="10" label="10"></option>
    </datalist>
    <label>
        <label>Owned:<input type="radio" id="owned" name="possession" value="owned" checked></label>
        <label>Wishlist:<input type="radio" id="wishlist" name="possession" value="wishlist"></label>
    </label>
    <input type="hidden" id="card_id" name="card_id" value="<?php echo $card[0]->getId();?>">
    <input type="submit" name="add" value="Add to Collection !"/>
</form>
				
				
<?php require('partials/footer.php') ?>