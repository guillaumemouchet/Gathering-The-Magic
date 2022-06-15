<?php
$title = "New Cards";
require('partials/header.php');
Helper::checkLogin();
?>
<h1>New Cards added to database since <?= $_SESSION["last_timestamp"] ?></h1>

<?php
if (sizeof($cards) > 0) {
	foreach ($cards as $card) {
		echo $card->asHTMLFlexBoxItem();
?>
		<hr>
	<?php
	}
} else {
	?>
	<p>No new cards since last time :(</p>
<?php
}
?>

<form id="btnSubmit" method="post" action="new_card">
	<input type="submit" name="add" value="Add new Card!" />
</form>
<?php require('partials/footer.php') ?>