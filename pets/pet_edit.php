<?php 

/* retrieve pet from pets.txt file to fill the input fields of the form */
session_start();

$email = $_SESSION['email'];
$pet_name = $_GET['pet_name'];

$petsFile = "../db/pets.txt";
$pets = explode("\n", file_get_contents($petsFile));
for ($i = 0; $i < count($pets); $i++) {
    $infoElementArray = explode(";", $pets[$i]);
    if ($infoElementArray[0] == $email && $infoElementArray[1] == $pet_name) {
        //PET FOUND --> retrieve img and infos
        if ( strpos($infoElementArray[11], 'default' ) !== false ){
            $img = '../img/pet.svg';
        } else {
            $img = $infoElementArray[11];
        }

        $pet_race = $infoElementArray[2];
        $pet_weight = $infoElementArray[3];
        $pet_size = $infoElementArray[4];
        $pet_hair = $infoElementArray[5];
        $pet_behaviours = $infoElementArray[6];
        $pet_fears = $infoElementArray[7];
        $pet_contests = $infoElementArray[8];
        $pet_groomed = $infoElementArray[9];
        $pet_comfortable = $infoElementArray[10];

    }
}

?>

<!doctype html>
<html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the pets page.</title>

    <?php
    include_once("../navbar/navbar.php");
    //session_start();
    ?>
    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="pet_name" class="form-label">Name</label>
                <input type="text" class="form-control" id="pet_name" name="pet_name" required <?php echo 'value="' . $pet_name .'"'; ?>>
            </div>

            <div class="mb-3">
                <label for="pet_race" class="form-label">Race</label>
                <input type="text" class="form-control" id="pet_race" name="pet_race" required <?php echo 'value="' . $pet_race .'"'; ?> >
            </div>

            <div class="mb-3">
                <label for="pet_weight" class="form-label">Weight (kg)</label>
                <input type="numeric" class="form-control" id="pet_weight" name="pet_weight" required <?php echo 'value="' . $pet_weight .'"'; ?>>
            </div>

            <select class="form-select" aria-label="Size" name="pet_size" required>
                <option >Size</option>
                <option value="small" <?php if ($pet_size == 'small') { echo 'selected'; } ?>>Small</option>
                <option value="medium" <?php if ($pet_size == 'medium') { echo 'selected'; } ?>>Medium</option>
                <option value="big" <?php if ($pet_size == 'big') { echo 'selected'; } ?>>Big</option>
            </select>
            <br>
            <div class="mb-3">
                <label for="pet_hair" class="form-label">Type of hair</label>
                <input type="text" class="form-control" id="pet_hair" name="pet_hair" required <?php echo 'value="' . $pet_hair .'"'; ?>>
            </div>

            <div class="mb-3">
                <label for="pet_behaviours" class="form-label">Strange behaviours?</label>
                <input type="text" class="form-control" id="pet_behaviours" name="pet_behaviours" <?php echo 'value="' . $pet_behaviours .'"'; ?>>
            </div>

            <div class="mb-3">
                <label for="pet_fears" class="form-label">Is it scared about something?</label>
                <input type="text" class="form-control" id="pet_fears" name ="pet_fears" <?php echo 'value="' . $pet_fears .'"'; ?>>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="partecipatingToContests" name="partecipatingToContests" value="contests" <?php if ($pet_contests == 1) { echo 'checked';} ?> />
                <label class="form-check-label" for="partecipatingToContests">
                    Is it partecipating to contests?
                </label>
            </div>

            <br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="usedToBeGroomed" name="usedToBeGroomed" value="groomed" <?php if ($pet_groomed == 1) { echo 'checked';} ?> />
                <label class="form-check-label" for="usedToBeGroomed">
                    Is it used to be groomed?
                </label>
            </div>
            
            <br>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="comfortableWithOtherPets" name="comfortableWithOtherPets" value="comfortable"  <?php if ($pet_comfortable == 1) { echo 'checked';} ?> />
                <label class="form-check-label" for="comfortableWithOtherPets">
                    Is it comfortable with other pets?
                </label>
            </div>

            <br>
            <br>

            <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-danger" onclick="history.back()">Cancel</button>
            <button class="btn btn-danger" type="button" onclick="deletepet(this)" name="delete_pet" value="<?php echo $pet_name; ?>">Delete Pet</button>
        </form>
    </div>

</body>

</html>

<script>

function deletepet(obj) {
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
                        window.location = './pets.php';
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

<?php

/* Retrieve old values of the pet */

//session_start();

$email = $_SESSION['email'];
$pet_name = $_GET['pet_name'];

$petsFile = "../db/pets.txt";
$pets = explode("\n", file_get_contents($petsFile));
for ($i = 0; $i < count($pets); $i++) {
    $infoElementArray = explode(";", $pets[$i]);
    if ($infoElementArray[0] == $email && $infoElementArray[1] == $pet_name) {
        //PET FOUND --> retrieve img and infos
        if ( strpos($infoElementArray[11], 'default' ) !== false ){
            $img = '../img/pet.svg';
        } else {
            $img = $infoElementArray[11];
        }

        $pet_race = $infoElementArray[2];
        $pet_weight = $infoElementArray[3];
        $pet_size = $infoElementArray[4];
        $pet_hair = $infoElementArray[5];
        $pet_behaviours = $infoElementArray[6];
        $pet_fears = $infoElementArray[7];
        $pet_contests = $infoElementArray[8];
        $pet_groomed = $infoElementArray[9];
        $pet_comfortable = $infoElementArray[10];

    }
}

/* When submit is clicked: replace the old line in the pets.txt file with the new one */

if(isset($_POST["submit"])) {
    
    /* Get new values from input fields */
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

    /* Build the new line to add in the file */
    $line = $_SESSION['email'] . ';' . $name . ';' . $race . ';' . $weight . ';' . $size . ';' .
    $hair . ';' . $behaviours . ';' . $fears . ';' .
    $contests . ';' . $groomed . ';' .
    $comfortable . ';' . $target;

    /* Build the old line to remove from the file */
    $old_line = $_SESSION['email'] . ';' . $pet_name . ';' . $pet_race . ';' . $pet_weight . ';' . $pet_size . ';' .
    $pet_hair . ';' . $pet_behaviours . ';' . $pet_fears . ';' .
    $pet_contests . ';' . $pet_groomed . ';' .
    $pet_comfortable . ';' . $target;

    /* Replace the lines */
    $file = file_get_contents('../db/pets.txt');
    $file = str_replace( $old_line, $line, $file );
    file_put_contents( '../db/pets.txt', $file );

    /* Show a confirmation message and redirect the user to pets page */
    echo '<script>
    alert("Pet info changed correctly!");
    window.location.href = "./pets.php";
    </script>';
    
}
?>