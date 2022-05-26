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
        <?php
            $txt_file = fopen('../db/pets.txt','r');
            $count = 1;
            while ($line = fgets($txt_file)) {
                $info = explode( "|", $line );
                //print_r( $info );
                if ( $count != 1 ){
                    echo '<li>
                    <div class="pet-image">
                        <img src="../img/pet.svg" style="width: 10%"></img>
                    </div>
                    <div class=pet-info>
                        Name: ' . $info[0] . '<br> Race: ' . $info[1];
                }
                $count++;
            }
            fclose($txt_file);
        ?>
    </ul>

    <button type="button" class="btn btn-success" onclick="location.href='./new_pet.php'">Add new pet</button>

</body>

</html>