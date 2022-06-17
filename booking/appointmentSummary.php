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

    $time = $_POST['time'];
    $date = substr($time, 0, strpos($time, 'T'));
    $hour = substr($time, strpos($time, 'T') + 1, strlen($time) - strpos($time, 'T'));

    echo '
        <script type="text/javascript" lang="javascript">
        sessionStorage.setItem("date","' . $date . '");
        sessionStorage.setItem("hour","' . $hour . '");';

    echo '
        
        </script>
        ';
    ?>
</head>

<body>
    <div class="container">
        <div class="tab-content text-center">
            <h1 style="font-weight: bold ;">Appointment Summary</h1>
            <div style="margin-top: 5%;">
                <div class="form-check d-flex" style="text-align: left; padding-left: 0;">
                    <div>
                        <label for="pet">Choose your pet</label>
                        <select name="Pets" id="petSelection">
                        </select>
                    </div>
                </div>
                <div class="form-check d-flex">
                    <input class="form-check-input me-2" type="checkbox" value="" id="lavaggio" aria-describedby="" />
                    <label class="form-check-label" for="lavaggio">
                        Wash
                    </label>
                </div>
                <div class="form-check d-flex">
                    <input class="form-check-input me-2" type="checkbox" value="" id="taglio_pelo" aria-describedby="" />
                    <label class="form-check-label" for="taglio_pelo">
                        Hair Cut
                    </label>
                </div>
                <div class="form-check d-flex">
                    <input class="form-check-input me-2" type="checkbox" value="" id="taglio_unghie" aria-describedby="" />
                    <label class="form-check-label" for="taglio_unghie">
                        Nails Cut
                    </label>
                </div>
                <div class="form-check d-flex">
                    <input class="form-check-input me-2" type="checkbox" value="" id="spa" aria-describedby="" />
                    <label class="form-check-label" for="spa">
                        SPA Treatment
                    </label>
                </div>
                <div class="form-check d-flex">
                    <input class="form-check-input me-2" type="checkbox" value="" id="anti_parassitari" aria-describedby="" />
                    <label class="form-check-label" for="anti_parassitari">
                        Anti Parasitic
                    </label>
                </div>
                <div class="form-check d-flex ">
                    <input class="form-check-input me-2" type="checkbox" value="" id="acconciatura_concorsi" aria-describedby="" />
                    <label class="form-check-label" for="acconciatura_concorsi">
                        Contest Preparation
                    </label>
                </div>
                <div style="margin-top: 5%;">
                    <label class="labels">Notes</label>
                    <input id="notes" type="search" class="form-control" placeholder="Additional notes" value="">
                </div>
            </div>
            <div style="margin-top: 10%;">
                <h2>Summary</h2>
            </div>
            <div>
                <span id="groomer"></span>
            </div>
            <div>
                <span id="date"></span>
            </div>
            <div>
                <span id="hour"></span>
            </div>
            <div style="margin-top: 10%;">
                <button class="btn btn-danger profile-button" type="button" onclick="back();">Cancel</button>
                <button class="btn btn-primary profile-button" type="button" onclick="confirmAppointment();">Confirm</button>
            </div>
        </div>
    </div>
</body>

<script>
    function back() {
        sessionStorage.setItem("date", "");
        sessionStorage.setItem("hour", "");
        window.location.href = './searchGroomerCalendar.php';
    }

    function confirmAppointment() {
        var service_ctr = 0;
        var lavaggio_control = document.getElementById('lavaggio').checked;
        var taglio_pelo_control = document.getElementById('taglio_pelo').checked;
        var taglio_unghie_control = document.getElementById('taglio_unghie').checked;
        var spa_control = document.getElementById('spa').checked;
        var anti_parassitari_control = document.getElementById('anti_parassitari').checked;
        var acconciatura_concorsi_control = document.getElementById('acconciatura_concorsi').checked;

        if ( lavaggio_control == 1 || taglio_pelo_control == 1 || taglio_unghie_control == 1 || spa_control == 1 || anti_parassitari_control == 1 || acconciatura_concorsi_control == 1 ) {
            service_ctr = 1;
        }
        
        if ( service_ctr == 0 ) {
            alert("At least one service must be chosen!");
        } else {
            console.log("confirm appointment");
            if ( confirm("Are you sure you want to add a new appointment?") ) {
                var addAppointment = function() {
                    $.ajax({
                        url: './add_appointment.php',
                        type: 'GET',
                        data: {
                            email: sessionStorage.getItem("email"),
                            pet: document.getElementById("petSelection").value,
                            groomer: sessionStorage.getItem("groomer"),
                            hour: sessionStorage.getItem("hour"),
                            date: sessionStorage.getItem("date"),
                            lavaggio: document.getElementById("lavaggio").checked ? 1 : 0,
                            taglio_pelo: document.getElementById("taglio_pelo").checked ? 1 : 0,
                            taglio_unghie: document.getElementById("taglio_unghie").checked ? 1 : 0,
                            spa: document.getElementById("spa").checked ? 1 : 0,
                            anti_parassitari: document.getElementById("anti_parassitari").checked ? 1 : 0,
                            notes: document.getElementById("notes").value,
                        },
                        success: function(data) {
                            console.log("added appointment"); // Inspect this in your console
                        }
                    });
                };

                addAppointment();

                sessionStorage.setItem("groomer", "");
                sessionStorage.setItem("date", "");
                sessionStorage.setItem("hour", "");
                window.location.href = "../index.php";
            }
        }
        
    }

    function getPets() {

        var getPetsByUser = function() {
            $.ajax({
                url: './get_pets.php',
                type: 'GET',
                data: {
                    email: sessionStorage.getItem("email")
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data); // Inspect this in your console
                    const petSelection = document.getElementById("petSelection");
                    for (var i = 0; i < data.length; i++) {
                        console.log(data[i]);
                        var opt = document.createElement("option");
                        opt.value = data[i];
                        opt.innerHTML = data[i];
                        petSelection.appendChild(opt);
                    }
                }
            });
        };

        getPetsByUser();
    }

    document.getElementById("groomer").innerHTML = sessionStorage.getItem("groomer");
    document.getElementById("date").innerHTML = sessionStorage.getItem("date");
    document.getElementById("hour").innerHTML = sessionStorage.getItem("hour");

    getPets();

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