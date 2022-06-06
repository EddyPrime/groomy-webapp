<?php
include("../functions/functions.php");
$file = "../db/users.txt";

$emailAddress = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$phoneNumber = $_POST['phoneNumber'];

$debugMessage = "Invalid email! Insert a new email address.";

//0 is false

// 1 is true

function containsSpecialChar($stringa)
{

    // array con l'ascii dei caratteri speciali
    $cs = array();

    // inserisco i codici ascii da 33 a 47
    for ($i = 33; $i <= 47; $i++) {
        $cs[] = $i;
    }
    // ciclo la stringa 
    for ($i = 0; $i < strlen($stringa); $i++) {

        // ascii del carattere nella posizione $i
        $ascii = ord($stringa[$i]);

        // controllo se ascii si trova nell'array con i caratteri speciali
        if (in_array($ascii, $cs)) {
            return true;
            // se è presente un solo carattere è inutile continuare il ciclo quidi esco
        }
    }

    // ritorno se sono presenti oppure non
    return false;
}





$accountInfo = $emailAddress . ";" . $password . ";" . $name . ";" . $surname . ";" . $phoneNumber;
function isPassworkOkay($password, $repeatPassword)
{
    global $debugMessage;
    if (strlen($password) < 5) {
        $debugMessage = "Password does not contain at least 5 digits";
        return false;
    }
    if (containsUpper($password) == false) {
        $debugMessage = "Password does not contain an upper case character";
        return false;
    }
    if ($password != $repeatPassword) {
        $debugMessage = "Values in the 'Password' and 'Repeat Password' fields do not match";
        return false;
    }
    if (containsSpecialChar($password)== false) {
        $debugMessage = "Passwords does not contain any special character";
        return false;
    }
    return true;
}

function containsUpper($str)
{
    for ($i = 0; $i < strlen($str); $i++) {
        $chr = mb_substr($str, $i, $i + 1, "UTF-8");
        if (mb_strtolower($chr, "UTF-8") != $chr) return true;
    }
    return false;
}


function insertAccount($filename, $accountInfo, $repeatPassword)
{
    $details = explode(";", $accountInfo);
    if (isPassworkOkay($details[1], $repeatPassword) == false) {
        return false;
    }
    $fileContent = fopen($filename, "r");
    while (!feof($fileContent)) {
        $row = fgets($fileContent);
        $infoElementArray = explode(";", $row);
        if ($infoElementArray[0] == $details[0]) {
            return false;
        }
    }
    file_put_contents($filename, $accountInfo . "\n", FILE_APPEND);
    return true;
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
$turno = insertAccount($file, $accountInfo, $repeatPassword);

if ($turno == true) {
    //file_put_contents($file, $accountInfo . "\n", FILE_APPEND);
    session_start();
    $_SESSION["email"] = $emailAddress;
    $_SESSION["name"] = $name;
    $_SESSION["surname"] = $surname;
    $_SESSION["phoneNumber"] = $phoneNumber;
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
                window.alert("' . $debugMessage . '");
                document.location.href="javascript:history.back()";
            </script>
        ';
}
