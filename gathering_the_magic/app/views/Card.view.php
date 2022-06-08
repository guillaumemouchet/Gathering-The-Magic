<?php
$title = "Add Card";
require('partials/header.php');
Helper::checkLogin();
?>

<h1>Add new Card to database</h1>
<?php
    if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>
<form method="post" action="parse_new_card">
    <div class="mb">
        <label id="title">Card name: <input type="text" id="cardName" name="cardName" pattern="[^%]+" required/></label>
    </div>
    <div class="mb">
        <label id="title">Card type: <input type="text" id="cardType" name="cardType" pattern="[^%]+" required/></label>
    </div>
    <div class="mb">
        <label id="title">Extension: <input type="text" id="extension" name="extension"required/></label>
        </div>
    
        <div class="mb">

    <label id="title">CMC: <input type="number" id="cmc" name="cmc" min='0'required/></label>
    </div>

    <label id="title">Color: </label>
    <div class="mb form-check d-flex flex-column">

        <?php
        if (sizeof($colors) > 0) {
            foreach ($colors as $color) {
        ?>
                <label id="color"><input class="form-check-input" type="checkbox" id=<?= $color ?> name=<?= $color ?> value=<?= $color ?> /><?= $color ?></label>

        <?php
            }
        } ?>
    </div>
    <div class="mb">
        <label id="title">Description: <input type="text" id="description" name="description" pattern="[^%]+" /></label>
    </div>
    <label id="btnSubmit"><input type="submit" name="search" value="Add new card !" /></label>

</form>