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
				//echo "<img src='./Card.jpg' alt='Blank Card'/>";
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

<?php require('partials/footer.php') ?>