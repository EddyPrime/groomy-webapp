<?php

$filename = "../db/users.txt";
$emailAddress = $_POST['email'];
$password = $_POST['password'];
$account = $emailAddress . $password;
$isPresent = 0;

/*
function parseFile($fileName, $separator = "\n")
{
    $fileArray = explode($separator, $fileName);
    $res = [];

    for ($i = 0; $i < count($fileArray); $i++) {
        $infoElementArray = explode(";", $fileArray[$i]);
        print_r($infoElementArray);
        array_push($res, $infoElementArray);
    }
    return $res;
}

function accountInfos($fileName, $emailPassword)
{
    $accountArray = parseFile($fileName);
    $res = [];
    for ($i = 0; $i < count($accountArray); $i++) {
        if ($accountArray[$i][0] . $accountArray[$i][1] == $emailPassword) {
            return $accountArray[$i];
        }
    }
}
$a = accountInfos($filename, $account);
print_r($a);

*/
function existingAccount($filename, $account)
{
    $users = explode("\n", file_get_contents($filename));
    $res = [];
    for ($i = 0; $i < count($users); $i++) {
        $infoElementArray = explode(";", $users[$i]);
        for ($j = 0; $j < count($infoElementArray); $j++) {

            if ($infoElementArray[0] . $infoElementArray[1] == $account) {
                $isPresent = 1;
                $surname = $infoElementArray[2];
                $telephone = $infoElementArray[3];
                array_push($res, $infoElementArray[0], $infoElementArray[1], $infoElementArray[2], $infoElementArray[3]);
                return $res;
            }
        }
    }
}
/*

$users = explode("\n", file_get_contents($filename));
for ($i = 0; $i < count($users); $i++) {
    $infoElementArray = explode(";", $users[$i]);
    for ($j = 0; $j < count($infoElementArray); $j++) {

        if ($infoElementArray[0] . $infoElementArray[1] == $account) {
            $isPresent = 1;
            $surname = $infoElementArray[2];
            $telephone = $infoElementArray[3];
        }
    }
}
*/
$a = existingAccount($filename, $account);
if (!empty($a) ){
    //setto il session storage con php
    //viene settato anche dopo dal codice javascript chiamato da php nell'echo
    session_start();
    //$_SESSION["email"] = $emailAddress;
    //$_SESSION["surname"] = $surname;
    //$_SESSION["telephone"] = $telephone;
    $emailAddress = $a[0];
    $surname = $a[2];
    $telephone = $a[3];
    $_SESSION["loggedIn"] = 1;
    echo '
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("email",';
    echo '"' . $emailAddress . '")';
    echo '
        sessionStorage.setItem("loggedIn",1)
        
        ';
    echo '
        sessionStorage.setItem("surname",';
    echo '"' . $surname . '")';
    echo '
        sessionStorage.setItem("telephone",';
    echo '"' . $telephone . '")';
    echo '
        document.location.href="../index.php"
        </script>
        ';
} else {
    echo '
    <script type="text/javascript" lang="javascript">
        window.alert("Utente non registrato!")
        document.location.href="./login.php"
        </script>
    ';
}
