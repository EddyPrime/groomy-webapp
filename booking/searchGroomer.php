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
    <div>
        <button type="button" class="btn btn-primary btn-block mb-3" onclick="window.location.href='./booking.php';">Back</button>
    </div>
    <button onclick="searchFavouriteGroomers();">Favourite Groomer </button>
    <p></p>
    <button onclick="window.location = '#';">Search Groomer By Name </button>
    <p></p>
    <input type="search" placeholder="Enter groomer's name"></input>
    <p></p>
    <button onclick="searchGroomersByDistance();">Search Groomer By Distance </button>
    <p></p>
    <button onclick="window.location = '#';">Search Groomer Using Maps </button>
</body>

<script>
    function searchGroomersByDistance() {

        var getGroomersByDistance = function() {
            $.ajax({
                url: './distance.php',
                type: 'GET',
                data: {},
                success: function(data) {
                    console.log(data); // Inspect this in your console
                }
            });
        };

        getGroomersByDistance();
    }

    function searchFavouriteGroomers() {

        var getFavouriteGroomers = function() {
            $.ajax({
                url: './favourites.php',
                type: 'GET',
                data: {
                    email: sessionStorage.getItem("email")
                },
                success: function(data) {
                    console.log(data); // Inspect this in your console
                }
            });
        };

        getFavouriteGroomers();
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