<?php
$title = "Add Card";
require('partials/header.php');
Helper::checkLogin();
?>

<h1>Add new Card to database</h1>

<form method="post" action="parse_new_card">
    <label id="title">Card name: <input type="text" id="cardName" name="cardName" pattern="[^%]+"></label>
    <label id="title">Card type: <input type="text" id="cardType" name="cardType" pattern="[^%]+"></label>

    <label id="title">Extension: <input type="text" id="extension" name="extension"></label>
    <label id="title">CMC: <input type="number" id="cmc" name="cmc" min='0'></label>


    <?php
    if (sizeof($colors) > 0) {
        foreach ($colors as $color) {
    ?>
            <label id="color"><input type="checkbox" id=<?= $color ?> name=<?= $color ?> value=<?= $color ?> /><?= $color ?></label>

    <?php
        }
    } ?>


    <label id="title">Description: <input type="text" id="description" name="description" pattern="[^%]+"></label>


    <label id="btnSubmit"><input type="submit" name="search" value="Add new card !" /></label>
</form>