<?php
    $title = "Add Card";
    require('partials/header.php')
?>

<h1>Add new Card to database</h1>

<form method="post" action="parse_new_card">
    <label id="title">Card name: <input type="text" id="cardName" name="cardName" pattern="[^%]+"></label>
    <label id="title">Card type: <input type="text" id="cardType" name="cardType" pattern="[^%]+"></label>

	<label id="title">Extension: <input type="text" id="extension" name="extension"></label>
	<label id="title">CMC: <input type="number" id="cmc" name="cmc" min ='0'></label>

    <label id="title">Color: </label> 
    <label id="color"><input type="checkbox" id="white" name="white" value="white" >White</label>
    <label id="color"><input type="checkbox" id="blue" name="blue" value="blue" >Blue</label>
    <label id="color"><input type="checkbox" id="black" name="black" value="black">Black</label>
    <label id="color"><input type="checkbox" id="red" name="red" value="red">Red</label>
    <label id="color"><input type="checkbox" id="green" name="green" value="green">Green</label>

	<label id="title">Description: <input type="text" id="description" name="description" pattern="[^%]+"></label>


    <div id="btnSubmit">
    <input type="submit" name="search" value="Add new card !">
</div>
</form>