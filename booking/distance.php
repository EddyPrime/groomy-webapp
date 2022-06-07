<?php

function getGroomersByDistance()
{
    $groomersFile = "../db/groomers.txt";
    $groomers = explode("\n", file_get_contents($groomersFile));
    $groms = [];
    for ($i = 1; $i < count($groomers); $i++) {
        $infoElementArray = explode(";", $groomers[$i]);
        if (rand(0, 10) < 5) {
            array_push($groms, $infoElementArray);
        }
    }
    echo json_encode($groms);
}

getGroomersByDistance();
