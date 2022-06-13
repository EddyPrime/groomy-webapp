<?php
include("../functions/functions.php");
$file = "../db/groomers.txt";

$time = $_POST['time'];
$date = substr($time, 0, strpos($time, 'T'));
$hour = substr($time, strpos($time, 'T') + 1, strlen($time) - strpos($time, 'T'));

echo '
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("date","' . $date . '");
        sessionStorage.setItem("hour","' . $hour . '");';


echo '
        window.location = "searchGroomerDate.php";
        </script>
        ';
