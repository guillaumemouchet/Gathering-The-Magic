<?php
    $title = "Add Card";
    require('partials/header.php')
?>

<h1>Add new Card to database</h1>

<form method="post" action="parse_new_card">
    <label>Card name: <input type="text" id="cardName" name="cardName" pattern="[^%]+"></label>
    <label>Card type: <input type="text" id="cardType" name="cardType" pattern="[^%]+"></label>

	<label>Extension: <input type="text" id="extension" name="extension"></label>
	<label>CMC: <input type="number" id="cmc" name="cmc" min ='0'></label>

    <label>Color: </label> 
    <label>White<input type="checkbox" id="white" name="white" ></label>
    <label>Blue<input type="checkbox" id="blue" name="blue" ></label>
    <label>Black<input type="checkbox" id="black" name="black"></label>
    <label>Red<input type="checkbox" id="red" name="red" ></label>
    <label>Green<input type="checkbox" id="green" name="green" ></label>

	<label>Description: <input type="text" id="description" name="description" pattern="[^%]+"></label>


    <input type="submit" name="search" value="Search">
    
</form>