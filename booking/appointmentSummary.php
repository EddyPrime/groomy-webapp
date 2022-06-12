<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Booking</title>

    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <?php
    include "../navbar/navbar.php";

    $time = $_POST['time'];

    echo '
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("date","' . $time . '")';

    echo '
        
        </script>
        ';
    ?>
</head>

<body>
    <div>
        <span id="groomer"></span>
    </div>
    <div>
        <span id="date"></span>
    </div>
    <div>
        <button class="btn btn-warning profile-button" type="button" onclick="back();">Cancel</button>
        <button class="btn btn-primary profile-button" type="button" onclick="">Confirm</button>
    </div>
</body>

<script>

    function back() {
        sessionStorage.setItem("date", "");
        window.location.href = './searchGroomerCalendar.php';
    }

    document.getElementById("groomer").innerHTML = sessionStorage.getItem("groomer");
    document.getElementById("date").innerHTML = sessionStorage.getItem("date");

    home.setAttribute("class", "nav-link");
    home.setAttribute("aria-current", "");

    booking.setAttribute("class", "nav-link active");
    booking.setAttribute("aria-current", "page");

    pets.setAttribute("class", "nav-link");
    pets.setAttribute("aria-current", "");

    profile.setAttribute("class", "nav-link");
    profile.setAttribute("aria-current", "");
</script>

</html>