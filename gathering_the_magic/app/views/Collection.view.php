<?php
$title = "Collection";
require('partials/header.php');
Helper::checkLogin();
?>
<h1>Collection</h1>
<?php
if (sizeof($collection) > 0) {
	foreach ($collection as $card) {

		echo $card->asHTMLFlexBoxItem();
	?>


		<hr><?php
		}
	} else {
			?>
	<p>No cards in collection yet :(</p>
<?php
	}
?>
<form class="form_display" id="btnSubmit" method="post" action="advanced_research">
	<input type="submit" name="add" value="Search Card!" />
</form>

<?php require('partials/footer.php') ?>