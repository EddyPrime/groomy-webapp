<?php

function delete_pet($pet_name)
{

    $txt_file = fopen('../db/pets.txt','r');
    while ( $line = fgets($txt_file) ) {
        $infoElementArray = explode(";", $line);
        if ($infoElementArray[0] == $pet_name) {
            $users = implode("\n", $users);
            file_put_contents($usersFile, $users);
        }
    }
}

delete_pet($_GET['pet_name']);
?>