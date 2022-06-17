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
    <div class="container search-by-date">
        <button type="button" class="btn btn-info btn-block go-back-btn" onclick="window.location.href='./booking.php'">
            <img src="../img/arrow-left.svg" style="color: white !important;"></img>
        </button>
        <div class="tab-content text-center">
            <h1 style="font-weight: bold ;">Choose a Groomer</h1>
            
            <h6>Here you can find the groomers available at the selected slot</h6>


            <div style="margin-top: 10%;">
                <div id="closeGroomers"></div>
            </div>
        </div>
    </div>
</body>

<script>
    function setGroomer(name) {
        sessionStorage.setItem("groomer", name);
        console.log(sessionStorage.getItem("groomer"));
        window.location.href = "./appointmentSummary2.php";
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

    window.onload = searchGroomersByDistance();

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