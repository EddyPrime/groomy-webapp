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
    <div>
        <button onclick="searchFavouriteGroomers();">Favourite Groomer </button>
        <div id="favGroomers"></div>
    </div>
    <p></p>
    <p></p>
    <div>
        <button onclick="searchGroomersByName();">Search Groomer By Name </button>
        <input id="groomerNameInput" type="search" placeholder="Enter groomer's name"></input>
        <div id="nameGroomers"></div>

    </div>
    <p></p>
    <div>
        <button onclick="searchGroomersByDistance();">Search Groomer By Distance </button>
        <div id="closeGroomers"></div>
    </div>
    <p></p>
    <button onclick="window.location = '#';">Search Groomer Using Maps </button>
</body>

<script>
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

                    var ul = document.createElement('ul');
                    ul.setAttribute('id', 'favGroomersList');

                    document.getElementById('favGroomers').innerHTML = '';
                    document.getElementById('favGroomers').appendChild(ul);

                    JSON.parse(data).forEach(renderGroomer);

                    function renderGroomer(element, index, arr) {
                        var li = document.createElement('li');
                        li.setAttribute('class', 'item');

                        ul.appendChild(li);

                        li.innerHTML = li.innerHTML + element;
                    }
                }
            });
        };

        getFavouriteGroomers();
    }

    function searchGroomersByName() {

        var getGroomersByName = function() {
            $.ajax({
                url: './name.php',
                type: 'GET',
                data: {
                    name: document.getElementById("groomerNameInput").value
                },
                success: function(data) {
                    console.log(data); // Inspect this in your console

                    var ul = document.createElement('ul');
                    ul.setAttribute('id', 'nameGroomersList');

                    ul.innerHTML = "";

                    document.getElementById('nameGroomers').innerHTML = '';
                    document.getElementById('nameGroomers').appendChild(ul);

                    JSON.parse(data).forEach(renderGroomer);

                    function renderGroomer(element, index, arr) {
                        var li = document.createElement('li');
                        li.setAttribute('class', 'item');

                        ul.appendChild(li);

                        li.innerHTML = li.innerHTML + element;
                    }
                }
            });
        };

        getGroomersByName();
    }

    function searchGroomersByDistance() {

        var getGroomersByDistance = function() {
            $.ajax({
                url: './distance.php',
                type: 'GET',
                data: {},
                success: function(data) {
                    console.log(data); // Inspect this in your console

                    var ul = document.createElement('ul');
                    ul.setAttribute('id', 'closeGroomersList');

                    ul.innerHTML = "";

                    document.getElementById('closeGroomers').innerHTML = '';
                    document.getElementById('closeGroomers').appendChild(ul);

                    JSON.parse(data).forEach(renderGroomer);

                    function renderGroomer(element, index, arr) {
                        var li = document.createElement('li');
                        li.setAttribute('class', 'item');

                        ul.appendChild(li);

                        li.innerHTML = li.innerHTML + element;
                    }
                }
            });
        };

        getGroomersByDistance();
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