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
    <div class="form-check d-flex">
        <div>
            <label for="pet">Choose your pet</label>
            <select name="Pets" id="pet">
                <option value="volvo">Volvo</option>
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
        <input class="form-check-input me-2" type="checkbox" value="" id="anti_parassitario" aria-describedby="" />
        <label class="form-check-label" for="anti_parassitario">
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