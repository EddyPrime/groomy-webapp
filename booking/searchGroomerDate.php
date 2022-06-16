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
        
        <div id="closeGroomers"></div>
    </div>
    
</body>

<script>

    function setGroomer(name) {
        sessionStorage.setItem("groomer",name);
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