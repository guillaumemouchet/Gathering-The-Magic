<?php
    $title = "Home";
    require('partials/header.php')
?>
<h1>Home Page</h1>

<p>
    Displaying Test Cards
</p>

<?php
		foreach ($cards as $card) {
			echo $card->asHTMLFlexBoxItem();
			echo "<img src='public/images/Card.jpg'>";
			?>
			
			<hr><?php
		}
		?>


<?php require('partials/footer.php') ?>
