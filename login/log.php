<?php

$filename = "../db/users.txt";
$emailAddress = $_POST['email'];
$password = $_POST['password'];
$account = $emailAddress.$password;
$isPresent = 0;

$users = explode("\n", file_get_contents($filename));
for ($i=0; $i<count($users); $i++){
    $infoElementArray = explode(";", $users[$i]);
    for ($j=0; $j<count($infoElementArray); $j++){
        
        if ($infoElementArray[0].$infoElementArray[1]==$account){
            $isPresent = 1;
            $surname = $infoElementArray[2];
            $telephone = $infoElementArray[3];

        }
    }
}
 
if ($isPresent == 1){
    //setto il session storage con php
    //viene settato anche dopo dal codice javascript chiamato da php nell'echo
    session_start();
    //$_SESSION["email"] = $emailAddress;
    //$_SESSION["surname"] = $surname;
    //$_SESSION["telephone"] = $telephone;
    //$_SESSION["loggedIn"] = 1;
    echo'
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("email",';
        echo'"'.$emailAddress. '")';
        echo'
        sessionStorage.setItem("loggedIn",1)
        
        ';
        echo'
        sessionStorage.setItem("surname",';
        echo'"'.$surname. '")';
        echo'
        sessionStorage.setItem("telephone",';
        echo'"'.$telephone. '")';
        echo'
        document.location.href="../index.php"
        </script>
        ';
    
}
else if ($isPresent==0){
    echo'
    <script type="text/javascript" lang="javascript">
        window.alert("Utente non registrato!")
        document.location.href="./login.php"
        </script>
    ';
}
