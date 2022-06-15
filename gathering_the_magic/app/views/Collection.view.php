<?php
    $title = "Collection";
    require('partials/header.php')
?>
<h1>Collection</h1>

<?php
		if(sizeof($collection) > 0)
		{
			foreach ($collection as $card) {
				echo $card->asHTMLFlexBoxItem();
				?>
				<img src="public/images/Card.jpg" alt="Blank Card"/>
				<hr><?php
			}
		}
		else
		{
			?><p>No cards in collection yet :(</p><?php
		}
		?>
		<form method="post" action="new_card">
    		<input type="submit" name="add" value="Add new Card!"/>
		</form>

<?php require('partials/footer.php') ?>