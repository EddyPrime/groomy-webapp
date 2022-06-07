<?php

function getUserFavourites($email)
{
    $favouritesFile = "../db/favourites.txt";
    $favourites = explode("\n", file_get_contents($favouritesFile));
    $favs = [];
    for ($i = 1; $i < count($favourites); $i++) {
        $infoElementArray = explode(";", $favourites[$i]);
        if ($infoElementArray[0] == $email) {
            array_push($favs, $infoElementArray[1]);
        }
    }
    echo json_encode($favs);
}

getUserFavourites($_GET['email']);
