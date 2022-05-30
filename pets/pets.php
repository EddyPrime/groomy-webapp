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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
    <h3>Here you can find all your pets</h3>

    <ul>
        <?php
            $txt_file = fopen('../db/pets.txt','r');
            $count = 1;
            while ($line = fgets($txt_file)) {
                $info = explode( ";", $line );
                //print_r( $info );
                if ( $count != 1 ){
                    
                    if (  strpos($info[10], 'default') !== false ){
                        $img = '../img/pet.svg';
                    } else {
                        $img = $info[10];
                    }

                    echo '<li>
                    <div class="pet-image">
                        <img src="'. $img . '" style="width: 10%"></img>
                    </div>
                    <div class=pet-info>
                        <span id="name">Name</span>: ' . $info[0] . '<br> Race: ' . $info[1] . '
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-danger" type="button" onclick="deletePet()" name="delete_pet">Delete Pet</button>
                    </div>    
                    </li>';
                    
                }
                
                $count++;
            }
            fclose($txt_file);
        ?>
    </ul>

    <button type="button" class="btn btn-success delete-pet" onclick="deletePet()">Add new pet</button>

</body>

</html>

<script>
    function deletePet() {
        if (confirm("Are you sure you want to delete your pet?")) {
            var deleteUser = function() {
                $.ajax({
                    url: './delete_pet.php',
                    type: 'GET',
                    data: {
                        pet_name: document.getElementById("span").value
                    },
                    success: function(data) {
                        console.log(data); // Inspect this in your console
                    }
                });
            };
            //delete_pet();
            window.location.href = './pets.php';
        }
    }
</script>