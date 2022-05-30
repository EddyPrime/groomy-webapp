<?php
$file = "../db/users.txt";

$emailAddress = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$phoneNumber = $_POST['phoneNumber'];

$account = $emailAddress . ";" . $password . ";";
$messaggio = $emailAddress . ";" . $password . ";" . $name . ";" . $surname . ";" . $phoneNumber;
$turno = 0;
$var = fopen($file, "r");
while (!feof($var)) {
    $riga = fgets($var);
    $split = explode(";", $riga);
    if ($split[0] == $emailAddress) {
        $turno = 1;
    }
}

if ($turno == 0) {
    file_put_contents($file, $messaggio, FILE_APPEND);
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
} else if ($turno == 1) {
    echo '
            <script type="text/javascript" lang="javascript">
                window.alert("Nome utente già presente! Inserire un nuovo nome utente.");
                document.location.href="javascript:history.back()";
            </script>
        ';
}
