<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the pets page.</title>

    <?php
    include_once("../navbar/navbar.php");
    ?>
    <link rel="stylesheet" type="text/css" href="./style/reset.css">
    <link rel="stylesheet" type="text/css" href="./style/fonts.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">

    
</head>

<body>
    <h3>Here you can find all your pets</h3>
    <ul>
        <li>
            Pet 1
        </li>
        <li>Pet2</li>
        <li>Pet3</li>
    </ul>

    <button type="button" class="btn btn-success" onclick="location.href='./new_pet.php'">Add new pet</button>


</body>

</html>