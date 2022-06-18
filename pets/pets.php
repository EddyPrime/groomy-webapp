<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the pets page.</title>

    <?php
    include("../navbar/navbar.php");
    session_start();
    ?>




    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="container pets-page text-center">
        <h1 style="font-weight: bold ;">Pets</h1>
        <p class="mb-5">Here you can manage you pets and register new ones!</p>
        <button type="button" class="btn btn-success" onclick="location.href='./new_pet.php'">Add new pet</button>
        <div class="pets-list">
            <ul>
                <?php
                $txt_file = fopen('../db/pets.txt', 'r');
                $count = 1;
                $printed = 0;


                while ($line = fgets($txt_file)) {
                    $line = trim($line);
                    $info = explode(";", $line);
                    //echo $line;
                    //echo $info[0];
                    //print_r( $info );
                    if ($count != 1 && $line != '' && $info[0] == $_SESSION['email']) {

                        if (strpos($info[11], 'default') !== false) {
                            $img = '../img/pet.svg';
                        } else {
                            $img = $info[11];
                        }

                        echo '<li>
                        <div class = "pet-details " >
                            <a href="./pet.php?pet_name=' . $info[1] . '" > 
                                <div class="pet-image ">
                                    <img src="' . $img . '"></img>
                                </div>
                                <div class="pet-info ">
                                    Name: <span id="name">' . $info[1] . '</span><br> Race: ' . $info[2] . '
                                </div>
                            </a>
                        </div>
                        </li>';

                        $printed++;
                    }

                    $count++;
                }
                fclose($txt_file);

                if ($printed == 0) {
                    echo '<p> You don\'t have any pet saved, add a new one!</p>';
                }
                ?>
            </ul>
        </div>
        
    </div>
</body>

</html>

<script>
    function delete_pet(obj) {
        value = obj.value
        //alert(value)
        if (confirm("Are you sure you want to delete your pet?")) {
            var deletePet = function() {
                $.ajax({
                    url: './delete_pet.php',
                    type: 'GET',
                    data: {
                        pet_name: value
                    },
                    success: function(data) {
                        //window.location.reload();
                        console.log(data); // Inspect this in your console
                    },
                    complete: function() {
                        window.location.reload();
                    }
                });
            };
            deletePet();
            //setTimeout( window.location.reload(), 1000 );
        }
    }

    home.setAttribute("class", "nav-link");
    home.setAttribute("aria-current", "");

    booking.setAttribute("class", "nav-link");
    booking.setAttribute("aria-current", "");

    pets.setAttribute("class", "nav-link active");
    pets.setAttribute("aria-current", "page");

    profile.setAttribute("class", "nav-link");
    profile.setAttribute("aria-current", "");
</script>