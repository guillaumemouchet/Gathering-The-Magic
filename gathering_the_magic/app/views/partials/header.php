<!DOCTYPE html>

<html>

<head>
    <title><?= htmlentities($title) ?></title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">


</head>

<body>
<?php require_once 'app/models/Card.php';?>   <script>
       
        setInterval(function() {
            <?php
                $_SESSION["newcards"] = Card::fetchByDate($_SESSION["last_timestamp"]);  
            ?>}, 1000*5);

    </script>
    <?php require('nav.php') ?>

    