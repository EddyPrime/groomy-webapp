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

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <?php
    include "../navbar/navbar.php";
    ?>
</head>

<body>

    <div class="container">
        <button type="button" class="btn btn-info btn-block go-back-btn" onclick="back();">
            <img src="../img/arrow-left.svg" style="color: white !important;"></img>
        </button>

        
        <div>
            <h1 style="font-weight: bold;" class="text-center">Choose</h1>
            <h1 style="font-weight: bold;" class="text-center">Date and Hour</h1>

        
        <form style="margin-top:15%;" action="./appointmentSummary.php" method="post">
            <input type="datetime-local" id="time" name="time" required>
            <button type="submit" class="btn btn-info">Search</button>
        </form>
        </div>
    </div>
</body>

<script>
    const today = (new Date()).toISOString().slice(0, 16); // get local current date
    document.getElementById("time").min = today;

    function back() {
        sessionStorage.setItem("groomer", "");
        window.location.href = './searchGroomer.php';
    }

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