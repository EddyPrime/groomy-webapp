<?php
include("../functions/functions.php");
$file = "../db/users.txt";

$emailAddress = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$phoneNumber = $_POST['phoneNumber'];


$accountInfo = $emailAddress . ";" . $password . ";" . $name . ";" . $surname . ";" . $phoneNumber;
function isPassworkOkay($password){
    if (strlen($password) < 5){
        return 0;
    }
    if (containsUpper($password) == 0) return 0;
    return 1;

}

function containsUpper($str) {
    for ($i=0; $i < strlen($str); $i++){
        $chr = mb_substr ($str, $i, $i+1, "UTF-8");
        if (mb_strtolower($chr, "UTF-8") != $chr) return 1;
    }
    return 0;
}


function insertAccount($filename, $accountInfo)
{
    $details = explode(";", $accountInfo);
    if (isPassworkOkay($details[1]) == 0) return 1;
    $fileContent = fopen($filename, "r");
    while (!feof($fileContent)) {
        $row = fgets($fileContent);
        $infoElementArray = explode(";", $row);
        if ($infoElementArray[0] == $details[0]) {
            return 1;
        }
    }
    file_put_contents($filename, $accountInfo . "\n", FILE_APPEND);
    return 0;
}

/*
$fileContent = fopen($file, "r");
while (!feof($fileContent)) {
    $row = fgets($fileContent);
    $infoElementArray = explode(";", $row);
    if ($infoElementArray[0] == $emailAddress) {
        $turno = 1;
    }
}
*/
$turno = insertAccount($file, $accountInfo);

if ($turno == 0) {
    //file_put_contents($file, $accountInfo . "\n", FILE_APPEND);
    session_start();
    $_SESSION["email"] = $emailAddress;
    $_SESSION["surname"] = $surname;
    $_SESSION["telephone"] = $phoneNumber;
    $_SESSION["loggedIn"] = 1;
    echo '
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("email",';
    echo '"' . $emailAddress . '")';
    echo '
        sessionStorage.setItem("loggedIn",1)
        
        ';
        echo '
        sessionStorage.setItem("password",';
    echo '"' . $password . '")';
    echo '
        sessionStorage.setItem("name",';
    echo '"' . $name . '")';
    echo '
        sessionStorage.setItem("surname",';
    echo '"' . $surname . '")';
    echo '
        sessionStorage.setItem("phoneNumber",';
    echo '"' . $phoneNumber . '")';
    echo '
        document.location.href="../index.php"
        </script>
        ';
} else {
    echo '
            <script type="text/javascript" lang="javascript">
                window.alert("Nome utente già presente! Inserire un nuovo nome utente.");
                document.location.href="javascript:history.back()";
            </script>
        ';
}
