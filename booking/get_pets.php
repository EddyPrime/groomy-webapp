<?php

function getPetsByUser($email)
{
    $petsFile = "../db/pets.txt";
    $pets = explode("\n", file_get_contents($petsFile));
    $pts = [];
    for ($i = 1; $i < count($pets); $i++) {
        $infoElementArray = explode(";", $pets[$i]);
        if ($infoElementArray[0] == $email) {
            array_push($pts, $infoElementArray[1]);
        }
    }
    echo json_encode($pts);
}

getPetsByUser($_GET['email']);
