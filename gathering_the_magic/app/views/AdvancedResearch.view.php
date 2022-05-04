<?php
    $title = "Advanced Research";<!-- on dirait plutot Advanced search (function) -->
    require('partials/header.php')
?>

<h1><?= htmlentities($title) ?></h1>

<!-- en general methode post plus approprie -->
<form method="get" action="parse_search_form">
    <label>Card name: <input type="text" id="cardName" name="cardName"></label><!-- HTML5 pas besoin de fermer input -->
    <!-- The rest of the form is disabled for the moment since we want to work with the API for the research later on -->
    <label>Card type: <input type="text" id="cardType" name="cardType" disabled></label>

    <label for="extension">Extension: </label>
    <!-- Selector will be completed with the API integration -->
    <select name="extension" id="extension" disabled>
        <option value="magicOrigins">Magic Origins</option>
        <option value="jumpstart">Jumpstart</option>
    </select>

    <label>Color: </label> 
    <label>White<input type="checkbox" id="white" name="white" disabled></label>
    <label>Blue<input type="checkbox" id="blue" name="blue" disabled></label>
    <label>Black<input type="checkbox" id="black" name="black" disabled></label>
    <label>Red<input type="checkbox" id="red" name="red" disabled></label>
    <label>Green<input type="checkbox" id="green" name="green" disabled></label>

    <label for="format">Format</label>
    <!-- Selector will be completed with the API integration -->
    <select name="format" id="format" disabled>
        <option value="standard">Standard</option>
        <option value="modern">Modern</option>
    </select>

    <input type="submit" name="search" value="Search">
    
</form>
