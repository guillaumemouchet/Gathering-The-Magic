<?php
    $title = "Search result";
    require('partials/header.php')
?>
<h1>Search result</h1>

<p>
    Displaying Test Cards
</p>

<?php echo $card[0]->asHTMLFlexBoxItem();//echo "<img src='./Card.jpg' alt='Blank Card'/>";	?>
				<img src="public/images/Card.jpg" alt="Blank Card"/>
				<hr>
				
				
				
<?php require('partials/footer.php') ?>