<?php
$title = "Search result";
require('partials/header.php');
Helper::checkLogin();
?>
<h1><?php echo $card[0]->getName(); ?></h1>


<?php echo $card[0]->asHTMLFlexBoxItem(); ?>
<hr>
<form class="form_display" method="post">
    <label>Add/remove <input type="number" id="quantity" name="quantity" value="1" min="1" max="100"></label>

    <input type="hidden" id="card_id" name="card_id" value="<?= htmlentities($card[0]->getId()); ?>">
    <!-- Pas très élégant mais fonctionnel-->
   <!-- <?php if ($_GET["owned"]=="true") 
    {  ?>
    <div class="mb form-check d-flex row">
        
        <div class="mx-3">
            <label>Owned: <input type="radio" id="owned" name="possession" value="owned" checked></label>
        </div>

        <div class="mx-3">
            <label>Wishlist: <input type="radio" id="wishlist" name="possession" value="wishlist"></label>
        </div>
    </div>
    <?php }else { ?>
        <div class="mb form-check d-flex row">
        
        <div class="mx-3">
            <label>Owned: <input type="radio" id="owned" name="possession" value="owned" ></label>
        </div>

        <div class="mx-3">
            <label>Wishlist: <input type="radio" id="wishlist" name="possession" value="wishlist" checked></label>
        </div>
    </div>
   <?php } ?> -->


    <input type="hidden" id="owned" name="owned" value="<?= htmlentities($_GET["owned"]); ?>">

    <label id="btnSubmit"><input type="submit" id="add" name="add" value="Add Quantity" formaction="parse_update_card" /></label>
    <label id="btnSubmit"><input type="submit" id="reduce" name="reduce" value="Reduce Quantity" formaction="parse_update_card" /></label>
    <label id="btnSubmit"><input type="submit" name="remove" value="Remove from collection !" formaction="parse_remove_card" /></label>

</form>



<?php require('partials/footer.php') ?>