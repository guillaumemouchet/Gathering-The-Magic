<?php
    $title = "Search result";
    require('partials/header.php')
?>
<h1>Search result</h1>

<?php
		if(sizeof($cards) > 0)
		{
			foreach ($cards as $card) {
				echo $card->asHTMLFlexBoxItem();
				//echo "<img src='./Card.jpg' alt='Blank Card'/>";
				?>
				<img src="public/images/Card.jpg" alt="Blank Card"/>
				<hr><?php
			}
		}
		else
		{
			?><p>No cards found :(</p><?php
		}
		?>


<?php require('partials/footer.php') ?>