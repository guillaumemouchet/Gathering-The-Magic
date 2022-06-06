<!DOCTYPE html>

<html>

<head>
    <title><?= htmlentities($title) ?></title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
<?php require_once 'app/models/Card.php';?>   <script>
       
        setInterval(function() {
            <?php
                $_SESSION["newcards"] = Card::fetchByDate($_SESSION["last_timestamp"]);  
            ?>}, 1000*5);

    </script>
    <?php require('nav.php') ?>

    