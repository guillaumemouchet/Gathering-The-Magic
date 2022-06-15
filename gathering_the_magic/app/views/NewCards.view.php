<?php
    $title = "New Cards";
    require('partials/header.php')
?>
<h1>New Cards added to database since //ADD DATE</h1>

<?php
		if(sizeof($cards) > 0)
		{
			foreach ($cards as $card) {
				echo $card->asHTMLFlexBoxItem();
				?>
				<hr><?php
			}
		}
		else
		{
			?><p>No new cards since last time :(</p><?php
		}
		?>

                
<?php require('partials/footer.php') ?>