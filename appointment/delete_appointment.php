<?php

/* Delete appointment from appointment.txt file */

session_start();

function deleteAppointment($groomer, $pet_name, $date)
{
    $email = $_SESSION['email'];
    $petsFile = "../db/appointments.txt";
    $pets = explode("\n", file_get_contents($petsFile));
    for ($i = 0; $i < count($pets); $i++) {
        $infoElementArray = explode(";", $pets[$i]);
        if ( $infoElementArray[0] == $email && $infoElementArray[1] == $pet_name && $infoElementArray[2] == $groomer && $date == $infoElementArray[5] ) {
            $pets[$i] = "";
            $pets = implode("\n", $pets);
            file_put_contents($petsFile, $pets);
        }
    }
}

deleteAppointment($_GET['groomer'], $_GET['pet_name'], $_GET['date']);

?>