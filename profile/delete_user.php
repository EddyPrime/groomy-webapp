<?php

function deleteUser($email)
{
    $usersFile = "../db/users.txt";
    $users = explode("\n", file_get_contents($usersFile));
    for ($i = 0; $i < count($users); $i++) {
        $infoElementArray = explode(";", $users[$i]);
        if ($infoElementArray[0] == $email) {
            $users[$i] = "";
            $users = implode("\n", $users);
            file_put_contents($usersFile, $users);
        }
    }
}

deleteUser($_GET['email']);
