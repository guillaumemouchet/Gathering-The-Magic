<?php
$title = "Search result";
require('partials/header.php');
Helper::checkLogin();
?>
<h1><?php echo $card[0]->getName(); ?></h1>

<?php echo $card[0]->asHTMLFlexBoxItem(); ?>
<hr>
<form class="form_display" method="post" action="parse_add_card">
    <label>How many cards do you want to add (between 1 and 100) <input type="number" id="quantity" name="quantity" min="1" max="100" value="1"></label>
    <div class="mb form-check d-flex row">
        <div class="mx-3">
            <label>Owned: <input type="radio" id="owned" name="possession" value="owned" checked></label>
        </div>
        <div class="mx-3">

            <label>Wishlist: <input type="radio" id="wishlist" name="possession" value="wishlist"></label>
        </div>
    </div>
    <input type="hidden" id="card_id" name="card_id" value="<?php echo $card[0]->getId(); ?>">

    <label id="btnSubmit"><input type="submit" name="add" value="Add to Collection !" /></label>

</form>


<?php require('partials/footer.php') ?>