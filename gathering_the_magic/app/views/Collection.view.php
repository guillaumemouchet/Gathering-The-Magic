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
				
			
			<hr><?php
			}
		}
		else
		{
			?><p>No cards in collection yet :(</p><?php
		}
		?>
		<form id="btnSubmit" method="post" action="new_card">
    		<input type="submit" name="add" value="Add new Card!"/>
		</form>

<?php require('partials/footer.php') ?>