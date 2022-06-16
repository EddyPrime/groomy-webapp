<?php

/* Delete appointment from appointment.txt file */

session_start();

function deleteAppointment($groomer, $pet_name)
{
    $email = $_SESSION['email'];
    $petsFile = "../db/appointment.txt";
    $pets = explode("\n", file_get_contents($petsFile));
    for ($i = 0; $i < count($pets); $i++) {
        $infoElementArray = explode(";", $pets[$i]);
        if ( $infoElementArray[0] == $email && $infoElementArray[1] == $pet_name && $infoElementArray[2] == $groomer ) {
            $pets[$i] = "";
            $pets = implode("\n", $pets);
            file_put_contents($petsFile, $pets);
        }
    }
}

deleteAppointment($_GET['groomer'], $_GET['pet_name']);

?>