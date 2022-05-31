<!doctype html>
<html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the pets page.</title>

    <?php
    include_once("../navbar/navbar.php");
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
    <h3>Here you can find all your pets</h3>

    <ul>
        <?php
            $txt_file = fopen('../db/pets.txt','r');
            $count = 1;
            while ( $line = fgets($txt_file) ) {
                $line = trim($line);
                $info = explode( ";", $line );
                //echo $line;
                //echo $info[0];
                //print_r( $info );
                if ( $count != 1 && $line != '' && $info[0] == $_SESSION['email'] ){
                    
                    if ( strpos($info[11], 'default' ) !== false ){
                        $img = '../img/pet.svg';
                    } else {
                        $img = $info[11];
                    }
                    
                    echo '<li>
                    <div class="pet-image">
                        <img src="'. $img . '" style="width: 10%"></img>
                    </div>
                    <div class=pet-info>
                        Name: <span id="name">' . $info[1] . '</span><br> Race: ' . $info[2] . '
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-danger" type="button" onclick="delete_pet(this)" name="delete_pet" value="'. $info[1] .'">Delete Pet</button>
                    </div>    
                    </li>';
                    
                }
                
                $count++;
            }

            fclose($txt_file);
        ?>
    </ul>

    <button type="button" class="btn btn-success delete-pet" onclick="location.href='./new_pet.php'">Add new pet</button>

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
                    complete: function(){
                        window.location.reload();
                    }
                });
            };
            deletePet();
            //setTimeout( window.location.reload(), 1000 );
        }
    }
</script>