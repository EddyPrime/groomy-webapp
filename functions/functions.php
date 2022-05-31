<?php

function redirect_to($path)
{
    header("location:$path");
}

//SIGN IN-UP RELATED FUNCTIONS

function existingAccount($filename, $account)
{
    $users = explode("\n", file_get_contents($filename));
    $res = [];
    for ($i = 0; $i < count($users); $i++) {
        $infoElementArray = explode(";", $users[$i]);
        for ($j = 0; $j < count($infoElementArray); $j++) {
            if ($infoElementArray[0] . $infoElementArray[1] == $account) {
                array_push($res, $infoElementArray[0], $infoElementArray[1], $infoElementArray[2], $infoElementArray[3], $infoElementArray[4]);
                return $res;
            }
        }
    }
}
