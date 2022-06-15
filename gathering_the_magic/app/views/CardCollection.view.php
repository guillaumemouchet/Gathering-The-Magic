<?php
$title = "Search result";
require('partials/header.php');
Helper::checkLogin();
?>
<h1><?php echo $card[0]->getName(); ?></h1>


<?php echo $card[0]->asHTMLFlexBoxItem(); ?>
<hr>
<form method="post">
    <label>Add/remove <input type="number" id="quantity" name="quantity" value="1" min="1" max="100"></label>

    <input type="hidden" id="card_id" name="card_id" value="<?php echo htmlentities($card[0]->getId()); ?>">

    <input type="hidden" id="owned" name="owned" value="<?php echo htmlentities($_GET["owned"]); ?>">

    

    <label id="btnSubmit"><input type="submit" id="add" name="add" value="Add Quantity" formaction="parse_update_card" /></label>
    <label id="btnSubmit"><input type="submit" id="reduce" name="reduce" value="Reduce Quantity" formaction="parse_update_card" /></label>
    <label id="btnSubmit"><input type="submit" name="remove" value="Remove from collection !" formaction="parse_remove_card" /></label>

</form>


<?php require('partials/footer.php') ?>