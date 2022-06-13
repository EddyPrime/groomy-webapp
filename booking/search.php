<?php
include("../functions/functions.php");
$file = "../db/groomers.txt";

$time = $_POST['time'];

echo '

        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("date",';
echo '"' . $time . '")';
        

echo '
        window.location = "searchGroomerDate.php";
        </script>
        ';
?>