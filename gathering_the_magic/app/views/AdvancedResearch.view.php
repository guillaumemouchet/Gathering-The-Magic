<?php
    $title = "Advanced Research";
    require('partials/header.php')
?>

<h1>Advanced research</h1>

<form method="get" action="parse_search_form">
    <label id="title">Card name: <input type="text" id="cardName" name="cardName" pattern="[^%]+"/></label>
    <!-- The rest of the form is disabled for the moment since we want to work with the API for the research later on -->
    <label id="title">Card type: <input type="text" id="cardType" name="cardType" pattern="[^%]+"/></label>

    <div class="wrapper">
    <label id="title"  for="extension">Extension: </label>
    <!-- Selector will be completed with the API integration str_replace(' ','',$extension)-->
    <select  name="extension" id="extension">
    <option value=""></option>

    <?php
    
    if(sizeof($extensions) > 0)
        {
            foreach ($extensions as $extension) {       
            ?>
           <option value=<?=str_replace(' ','_',$extension)?>><?=$extension?></option> <!-- getting rid of whitespaces for the name-->
               <?php
            }
        }?>
    </select>
    </div>

    <label id="title">Color: </label> 
    <?php
    if(sizeof($colors) > 0)
        {
            foreach ($colors as $color) {       
            ?>
                <label id="color"><input type="checkbox" id=<?=$color?> name=<?=$color?> value=<?=$color?>/><?=$color?></label>

               <?php
            }
        }?>

    <label id="title">Description: <input type="text" id="description" name="description" pattern="[^%]+"/></label>

    <!--
    <div class="wrapper">
    <label  id="title"for="format">Format:</label>
     Selector will be completed with the API integration 
    <select name="format" id="format" disabled>
        <option value="standard">Standard</option>
        <option value="modern">Modern</option>
    </select>
    </div>-->
    <label id="btnSubmit"><input type="submit" name="search" value="Search"/></label>

</form>