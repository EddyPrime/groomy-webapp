<?php

function redirect_to($path)
{
    header("location:$path");
}

function isLoggedIn()
{
    session_start();
    return $_SESSION["loggedIn"];
}
