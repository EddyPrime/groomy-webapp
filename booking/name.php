<?php

function getGroomerByName($name)
{

    $groomersFile = "../db/groomers.txt";
    $groomers = explode("\n", file_get_contents($groomersFile));
    $groms = [];

    for ($i = 1; $i < count($groomers); $i++) {
        $infoElementArray = explode(";", $groomers[$i]);
        if (strpos($infoElementArray[0], $name) !== false) {
            array_push($groms, $infoElementArray);
        }
    }
    echo json_encode($groms);
}

getGroomerByName($_GET['name']);
