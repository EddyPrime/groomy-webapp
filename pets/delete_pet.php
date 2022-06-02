<?php

/* Delete pet from pets.txt file */

session_start();

function deletePet($pet_name)
{
    $email = $_SESSION['email'];
    $petsFile = "../db/pets.txt";
    $pets = explode("\n", file_get_contents($petsFile));
    for ($i = 0; $i < count($pets); $i++) {
        $infoElementArray = explode(";", $pets[$i]);
        if ($infoElementArray[0] == $email && $infoElementArray[1] == $pet_name) {
            $pets[$i] = "";
            $pets = implode("\n", $pets);
            file_put_contents($petsFile, $pets);
        }
    }
}

deletePet($_GET['pet_name']);

?>