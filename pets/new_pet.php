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

    
</head>

<body>

    <h1>Add new pet</h1>

    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="pet_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="pet_name" name="pet_name" required>
        </div>

        <div class="mb-3">
            <label for="pet_race" class="form-label">Race</label>
            <input type="text" class="form-control" id="pet_race" name="pet_race" required>
        </div>

        <div class="mb-3">
            <label for="pet_weight" class="form-label">Weight (kg)</label>
            <input type="numeric" class="form-control" id="pet_weight" name="pet_weight" required>
        </div>

        <select class="form-select" aria-label="Size" name="pet_size" required>
            <option selected>Size</option>
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="big">Big</option>
        </select>
        <br>
        <div class="mb-3">
            <label for="pet_hair" class="form-label">Type of hair</label>
            <input type="text" class="form-control" id="pet_hair" name="pet_hair" required>
        </div>

        <div class="mb-3">
            <label for="pet_behaviours" class="form-label">Strange behaviours?</label>
            <input type="text" class="form-control" id="pet_behaviours" name="pet_behaviours">
        </div>

        <div class="mb-3">
            <label for="pet_fears" class="form-label">Is it scared about something?</label>
            <input type="text" class="form-control" id="pet_fears" name ="pet_fears">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="partecipatingToContests" name="partecipatingToContests" value="contests" />
            <label class="form-check-label" for="partecipatingToContests">
                Is it partecipating to contests?
            </label>
        </div>

        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="usedToBeGroomed" name="usedToBeGroomed" value="groomed" />
            <label class="form-check-label" for="usedToBeGroomed">
                Is it used to be groomed?
            </label>
        </div>
        
        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="comfortableWithOtherPets" name="comfortableWithOtherPets" value="comfortable" />
            <label class="form-check-label" for="comfortableWithOtherPets">
                Is it comfortable with other pets?
            </label>
        </div>

        <br>

        <div class="input-group">
            <input type="file" class="form-control" id="pet_image" aria-label="Upload" name="pet_image">
            <button class="btn btn-outline-secondary" type="button" id="pet_image">Button</button>
        </div>

        <br>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>


</body>

</html>

<?php

/* When Submit is clicked, add the new pet in pets.txt file */

if(isset($_POST["submit"])) {
    echo '<script>
        console.log("test");
        </script>';

    /* Parse each field received from the form */
    $name = $_POST['pet_name'];
    $race = $_POST['pet_race'];
    $weight = $_POST['pet_weight'];
    $size = $_POST['pet_size'];
    $hair = $_POST['pet_hair'];
    $behaviours = $_POST['pet_behaviours'];
    $fears = $_POST['pet_fears'];
    $contests = $_POST['partecipatingToContests'];
    $groomed = $_POST['usedToBeGroomed'];
    $comfortable = $_POST['comfortableWithOtherPets'];
    $image = $_POST['pet_image'];
    
    /* Add a value to fields is they're not filled */
    if ( $behaviours == '' ){
        $behaviours = 'none';
    }
    
    if ( $fears == '' ){
        $fears = 'none';
    }

    if ( isset($contests) ) {
        $contests = 1;
    } else {
        $contests = 0;
    }

    if ( isset($groomed) ) {
        $groomed = 1;
    } else {
        $groomed = 0;
    }

    if ( isset($comfortable) ) {
        $comfortable = 1;
    } else {
        $comfortable = 0;
    }
    
    /* Save pet_image in img folder */
    
    if ( $_FILES['pet_image']['error'] > 0) {
        $target = 'default';
    } else {
        $ext = $info['extension']; // get the extension of the file
        //$newname = $_SESSION['email'] . $name .$ext; 
        $newname = $name .$ext;
        
        $target = '../img/'.$newname;
        move_uploaded_file( $_FILES['pet_image']['tmp_name'], $target);
    }
    
    /* Print each field */
    /*
    echo 'Name : ' . $name;
    echo 'Race : ' . $race;
    echo 'Weight: ' . $weight;
    echo 'Size: ' . $size;
    echo 'Hair: ' . $hair;
    echo 'Behaviours: ' . $behaviours;
    echo 'Fears: ' . $fears;
    echo 'Contests: ' . isset($contests);
    echo 'Groomed: ' . isset($groomed);
    echo 'Comfortable: ' . isset($comfortable);
    echo 'Image: ' . $image;
    */

    /*
    Create the line to add in the pets.txt file.
    first element in each line of pets.txt is the id of the pet owner
    $line = $_SESSION['id'];
    */
    $line = $_SESSION['email'] . ';' . $name . ';' . $race . ';' . $weight . ';' . $size . ';' .
    $hair . ';' . $behaviours . ';' . $fears . ';' .
    $contests . ';' . $groomed . ';' .
    $comfortable . ';' . $target . "\r\n";
    
    /* Open the pets.txt file */
    $fp = fopen('../db/pets.txt', 'a+');
    
    /* Write the line in the file */
    if(fwrite($fp, $line))  {
        echo 'saved';
    
    }
    fclose ($fp);   
    
    //echo 'PET REGISTERED CORRECTLY';

    /* Redirect the user to pets page */
    echo '
        <script>
        alert("Pet added correctly!")
        window.location="./pets.php"
        </script>';
    
}

?>