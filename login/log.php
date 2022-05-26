<?php

$filename = "../db/users.txt";
$emailAddress = $_POST['email'];
$password = $_POST['password'];
$account = $emailAddress.";".$password;
$isPresent = 0;

$users = explode("\n", file_get_contents($filename));
for ($i=0;$i<count($users);$i++){
    if ($users[$i]==$account){
        $isPresent = 1;
    }
}
 
if ($isPresent == 1){
    //setto il session storage con php
    //viene settato anche dopo dal codice javascript chiamato da php nell'echo
    session_start();
    $_SESSION["log"] = $emailAddress;
    $_SESSION["loggedIn"] = 1;
    echo'
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("log",';
        echo'"'.$emailAddress. '")';
        echo'
        sessionStorage.setItem("loggedIn",1)
        
        ';
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
