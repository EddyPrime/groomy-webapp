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
    <button type="button" class="btn btn-info btn-block go-back-btn" onclick="window.location.href='./booking.php'">
        <img src="../img/arrow-left.svg" style="color: white !important;"></img>
    </button>
    <div>
        <button onclick="searchFavouriteGroomers();">Favourite Groomer </button>
        <div id="favGroomers"></div>
    </div>
    <br>
    <br>
    <div>
        <button onclick="searchGroomersByName();">Search Groomer By Name </button>
        <br>
        <input id="groomerNameInput" type="search" placeholder="Enter groomer's name"></input>
        <div id="nameGroomers"></div>

    </div>
    <br>
    <br>
    <div>
        <button onclick="searchGroomersByDistance();">Search Groomer By Distance </button>
        <div id="closeGroomers"></div>
    </div>
    <br>
    <br>
    <button onclick="showMap();">Search Groomer Using Maps </button>
    <div id="groomersMap" style="display: none;">
        <a onclick="setGroomer('CanePulito');">
            <img src="../img/MAP.png" style="width: 75%;">
        </a>
    </div>
</body>

<script>
    var map_displayed = 0;

    function showMap() {
        console.log('test');
        if (map_displayed == 0) {
            document.getElementById('groomersMap').style.display = 'block';
            map_displayed = 1;
        } else {
            document.getElementById('groomersMap').style.display = 'none';
            map_displayed = 0;
        }
    }

    function setGroomer(name) {
        sessionStorage.setItem("groomer", name);
        console.log(sessionStorage.getItem("groomer"));
        window.location.href = "./searchGroomerCalendar.php";
    }

    function renderGroomer(ul, data) {

        JSON.parse(data).forEach(_renderGroomer);

        function _renderGroomer(element, index, arr) {
            var li = document.createElement('li');
            li.setAttribute('class', 'item');
            li.setAttribute("onclick", "setGroomer(this.firstChild.innerHTML);");

            const br = document.createElement('br');

            var elem = document.createElement('span');
            elem.innerHTML = element[0];
            li.appendChild(elem);
            li.appendChild(br);

            elem = document.createElement('span');
            elem.innerHTML = element[1];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = element[2];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = element[3];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = element[4];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            ul.appendChild(li);
        }
    }

    function renderFavGroomer(ul, data) {

        JSON.parse(data).forEach(_renderGroomer);

        function _renderGroomer(element, index, arr) {
            var li = document.createElement('li');
            li.setAttribute('class', 'item');

            const br = document.createElement('br');

            var elem = document.createElement('span');
            elem.innerHTML = element;
            elem.setAttribute("onclick", "setGroomer(this.innerHTML);");
            li.appendChild(elem);
            li.appendChild(br);

            ul.appendChild(li);
        }
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
                    //console.log(data); // Inspect this in your console

                    var ul = document.createElement('ul');
                    ul.setAttribute('id', 'favGroomersList');

                    document.getElementById('favGroomers').innerHTML = '';
                    document.getElementById('favGroomers').appendChild(ul);

                    renderFavGroomer(ul, data);
                }
            });
        };

        getFavouriteGroomers();
    }

    function searchGroomersByName() {

        var getGroomersByName = function() {

            const name = document.getElementById("groomerNameInput").value;
            if (name.length < 1)
                return;

            $.ajax({
                url: './name.php',
                type: 'GET',
                data: {
                    name: name
                },
                success: function(data) {
                    //console.log(data); // Inspect this in your console

                    var ul = document.createElement('ul');
                    ul.setAttribute('id', 'nameGroomersList');

                    ul.innerHTML = "";

                    document.getElementById('nameGroomers').innerHTML = '';
                    document.getElementById('nameGroomers').appendChild(ul);

                    renderGroomer(ul, data);
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
                    //console.log(data); // Inspect this in your console

                    var ul = document.createElement('ul');
                    ul.setAttribute('id', 'closeGroomersList');

                    ul.innerHTML = "";

                    document.getElementById('closeGroomers').innerHTML = '';
                    document.getElementById('closeGroomers').appendChild(ul);

                    renderGroomer(ul, data);
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