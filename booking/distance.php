<?php

function getGroomersByDistance()
{
    $groomersFile = "../db/closeGroomers.txt";
    $groomers = explode("\n", file_get_contents($groomersFile));
    $groms = [];
    for ($i = 1; $i < count($groomers); $i++) {
        $infoElementArray = explode(";", $groomers[$i]);
        array_push($groms, $infoElementArray);
    }
    echo json_encode($groms);
}

getGroomersByDistance();
