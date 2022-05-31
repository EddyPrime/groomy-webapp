<?php

function editUser($oldEmail, $firstName, $lastName, $email, $phoneNumber, $password)
{
    $usersFile = "../db/users.txt";
    $users = explode("\n", file_get_contents($usersFile));
    for ($i = 0; $i < count($users); $i++) {
        $infoElementArray = explode(";", $users[$i]);
        if ($infoElementArray[0] == $oldEmail) {
            $new_user = [];
            array_push($new_user, $email, $password, $firstName, $lastName, $phoneNumber);
            $users[$i] = implode(";", $new_user);
            $users = implode("\n", $users);
            file_put_contents($usersFile, $users);
        }
    }
}

editUser($_GET['oldEmail'],$_GET['firstName'],$_GET['lastName'],$_GET['email'],$_GET['phoneNumber'],$_GET['password']);
