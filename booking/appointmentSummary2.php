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
    <div class="form-check d-flex">
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
            Nail Cut
        </label>
    </div>
    <div class="form-check d-flex">
        <input class="form-check-input me-2" type="checkbox" value="" id="spa" aria-describedby="" />
        <label class="form-check-label" for="spa">
            Spa
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
            Contest Hairstyle
        </label>
    </div>
    <div>
        <label class="labels">Notes</label>
        <input id="notes" type="search" class="form-control" placeholder="Additional notes" value="">
    </div>
    <h2>Summary</h2>
    <div>
        <span id="groomer"></span>
    </div>
    <div>
        <span id="date"></span>
    </div>
    <div>
        <button class="btn btn-warning profile-button" type="button" onclick="back();">Cancel</button>
        <button class="btn btn-primary profile-button" type="button" onclick="confirmAppointment();">Confirm</button>
    </div>
</body>

<script>
    function back() {
        sessionStorage.setItem("date", "");
        window.location.href = './searchGroomerCalendar.php';
    }

    function confirmAppointment() {
        console.log("confirm appointment");

        var addAppointment = function() {
            $.ajax({
                url: './add_appointment.php',
                type: 'GET',
                data: {
                    email: sessionStorage.getItem("email"),
                    pet: document.getElementById("petSelection").value,
                    groomer: sessionStorage.getItem("groomer"),
                    hour: sessionStorage.getItem("date"),
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

        sessionStorage.setItem("groomer","");
        sessionStorage.setItem("date","");
        window.location.href = "../index.php";
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