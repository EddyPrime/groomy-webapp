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
    <div class="container search-groomer-by-name-page">
        <button type="button" class="btn btn-info btn-block go-back-btn" onclick="window.location.href='./booking.php'">
            <img src="../img/arrow-left.svg" style="color: white !important;"></img>
        </button>
        <div class="tab-content text-center">
            <h1 style="font-weight: bold ;">Choose a</h1>
            <h1 style="font-weight: bold ; margin-top:-5%;">Groomer</h1>

            <div class="search-modality">
                <button class="btn btn-info" onclick="searchFavouriteGroomers();">Favourite Groomer</button>
                <div style="display: none;">
                    <input type="search" placeholder="Enter groomer's name"></input>
                    <button class="btn btn-info">Search</button>
                </div>
                <div id="favGroomers"></div>
            </div>
            <div class="search-modality">
                <button class="btn btn-info" onclick="showSearchByName();">Search Groomer By Name</button>
                <br>
                <div id="searchByName" style="display:none;">
                    <input id="groomerNameInput" type="search" placeholder="Enter groomer's name"></input>
                    <button class="btn btn-info" onclick="searchGroomersByName();">Search</button>
                </div>
                <div id="nameGroomers"></div>

            </div>
            <div class="search-modality">
                <button class="btn btn-info" onclick="searchGroomersByDistance();">Search Groomer By Distance </button>
                <div style="display: none;">
                    <input type="search" placeholder="Enter groomer's name"></input>
                    <button class="btn btn-info">Search</button>
                </div>
                <div id="closeGroomers"></div>
            </div>
            <div class="search-modality">
                <button class="btn btn-info" onclick="showMap();">Search Groomer Using Maps </button>

                <div id="groomersMap" style="display: none;">
                    <a onclick="setGroomer('CanePulito');">
                        <img src="../img/MAP.png" style="width: 100%; margin-top: 5%;">
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    var map_displayed = 0;
    var favourite_groomers_displayed = 0;
    var groomers_by_distance_displayed = 0;

    function hideFavs() {
        document.getElementById("favGroomers").innerHTML = "";
        favourite_groomers_displayed = 0;
    }

    function hideClose() {
        document.getElementById("closeGroomers").innerHTML = "";
        groomers_by_distance_displayed = 0;
    }

    function hideMap() {
        document.getElementById('groomersMap').style.display = 'none';
        map_displayed = 0;
    }

    function showMap() {
        if (map_displayed == 0) {
            document.getElementById('groomersMap').style.display = 'block';
            map_displayed = 1;
            hideSearchByName();
            hideFavs();
            hideClose();
        } else {
            hideMap();
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
            elem.innerHTML = 'Tel: ' + element[2];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = element[3];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = 'Hours: ' + element[4];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            ul.appendChild(li);
        }
    }

    function renderCloseGroomer(ul, data) {

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
            elem.innerHTML = 'Tel: ' + element[2];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = element[3];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = 'Hours: ' + element[4];
            li.appendChild(elem);
            li.appendChild(br.cloneNode(true));

            elem = document.createElement('span');
            elem.innerHTML = 'Distance (Km): ' + element[5];
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
            li.setAttribute("onclick", "setGroomer(this.innerHTML);");
            li.appendChild(elem);
            li.appendChild(br);

            ul.appendChild(li);
        }
    }

    function searchFavouriteGroomers() {
        if (favourite_groomers_displayed == 0) {
            var getFavouriteGroomers = function() {
                $.ajax({
                    url: './favourites.php',
                    type: 'GET',
                    data: {
                        email: sessionStorage.getItem("email")
                    },
                    success: function(data) {
                        //console.log(data); // Inspect this in your console

                        hideClose();
                        hideMap();
                        hideSearchByName();

                        var ul = document.createElement('ul');
                        ul.setAttribute('id', 'favGroomersList');

                        document.getElementById('favGroomers').innerHTML = '';
                        document.getElementById('favGroomers').appendChild(ul);

                        renderFavGroomer(ul, data);
                    }
                });
            };

            getFavouriteGroomers();
            favourite_groomers_displayed = 1;
        } else {
            hideFavs();
        }

    }

    var formVisible = 0;

    function hideSearchByName() {
        formVisible = 0;
        document.getElementById("searchByName").setAttribute("style", "display: none;")
        document.getElementById("nameGroomers").innerHTML = "";
    }

    function displaySearchByName() {
        formVisible = 1;
        document.getElementById("searchByName").setAttribute("style", "display: block;")
    }

    function showSearchByName() {
        if (formVisible) {
            hideSearchByName();
        } else {
            displaySearchByName();
            hideFavs();
            hideClose();
            hideMap();
        }
    }

    function searchGroomersByName() {

        var getGroomersByName = function() {

            const name = document.getElementById("groomerNameInput").value.trim();
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
        if (groomers_by_distance_displayed == 0) {
            var getGroomersByDistance = function() {
                $.ajax({
                    url: './distance.php',
                    type: 'GET',
                    data: {},
                    success: function(data) {
                        //console.log(data); // Inspect this in your console

                        hideSearchByName();
                        hideFavs();
                        hideMap();

                        var ul = document.createElement('ul');
                        ul.setAttribute('id', 'closeGroomersList');

                        ul.innerHTML = "";

                        document.getElementById('closeGroomers').innerHTML = '';
                        document.getElementById('closeGroomers').appendChild(ul);

                        renderCloseGroomer(ul, data);
                    }
                });
            };

            getGroomersByDistance();
            groomers_by_distance_displayed = 1;
        } else {
            hideClose();
        }

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