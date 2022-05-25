<?php

function redirect_to_homepage() {
    header("location:../home/home.php");
}

function redirect_to_login() {
    header("location:../login/login.php");
}

function isLoggedIn() {
    session_start();
    if (!$_SESSION["loggedIn"]) {
        redirect_to_login();
        die;
    }
    else {
        redirect_to_homepage();
    }
}
