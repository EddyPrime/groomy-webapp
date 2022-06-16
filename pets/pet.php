<?php

/* retrieve pet from pets.txt file */
session_start();

$email = $_SESSION['email'];
$pet_name = $_GET['pet_name'];

$petsFile = "../db/pets.txt";
$pets = explode("\n", file_get_contents($petsFile));
for ($i = 0; $i < count($pets); $i++) {
    $infoElementArray = explode(";", $pets[$i]);
    if ($infoElementArray[0] == $email && $infoElementArray[1] == $pet_name) {
        //PET FOUND --> retrieve img and infos
        if (strpos($infoElementArray[11], 'default') !== false) {
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

        if ($pet_contests == 1) {
            $pet_contests = 'Yes';
        } else {
            $pet_contests = 'No';
        }

        if ($pet_groomed == 1) {
            $pet_groomed = 'Yes';
        } else {
            $pet_groomed = 'No';
        }

        if ($pet_comfortable == 1) {
            $pet_comfortable = 'Yes';
        } else {
            $pet_comfortable = 'No';
        }
    }
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the pet page.</title>

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
    <button type="button" class="btn btn-info btn-block go-back-btn" onclick="window.location.href='./pets.php';">
        <img src="../img/arrow-left.svg" style="color: white !important;"></img>
    </button>
    <div class="container">
        <div class="pet-image">
            <?php
            echo '<img src="' . $img . '"></img>';
            ?>
        </div>
        <div class="pet-info">
            <?php
            echo '<div class="row">Name: ' . $pet_name . '</div>';
            echo '<div class="row">Race: ' . $pet_race . '</div>';
            echo '<div class="row">Weight: ' . $pet_weight . '</div>';
            echo '<div class="row">Size: ' . $pet_size . '</div>';
            echo '<div class="row">Hair: ' . $pet_hair . '</div>';
            echo '<div class="row">Strange Behaviours: ' . $pet_behaviours . '</div>';
            echo '<div class="row">Fears: ' . $pet_fears . '</div>';
            echo '<div class="row">Is it partecipating to contests? ' . $pet_contests . '</div>';
            echo '<div class="row">Is it used to be groomed? ' . $pet_groomed . '</div>';
            echo '<div class="row">Is it comfortable with other pets? ' . $pet_comfortable . '</div>';
            ?>
        </div>
        <?php
        echo '<button type="button" class="btn btn-secondary" onclick=' . 'window.location.href="./pet_edit.php?pet_name=' . $pet_name . '"' . '>Edit</button>';
        ?>
    </div>

</body>

</html>

<script>
    home.setAttribute("class", "nav-link");
    home.setAttribute("aria-current", "");

    booking.setAttribute("class", "nav-link");
    booking.setAttribute("aria-current", "");

    pets.setAttribute("class", "nav-link active");
    pets.setAttribute("aria-current", "page");

    profile.setAttribute("class", "nav-link");
    profile.setAttribute("aria-current", "");
</script>