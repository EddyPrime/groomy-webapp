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
    ?>
</head>

<body>

    <div class='container text-center'>
        <h1 style="font-weight: bold ; text-align: center;">BOOK</h1>
        <h6>Here you can book your appointments! You may choose either to reserve an appointment with a groomer on a time slot that you choose or to choose the time slot on the base of the pet groomer you selected!</h6>
        <div style="margin-top: 30%;">
            <div class="text-center mb-3" style=" display: flex; justify-content: center;">
                <div>
                    <button class="btn btn-outline-info" onclick="searchByDateClick();">Search By Date</button>
                    <div id="datetimeForm" style="visibility: hidden;">
                        <form action="./search.php" method="post">
                            <input type="datetime-local" id="time" name="time" required>
                            <button type="submit" class="btn btn-info">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3" style=" display: flex; justify-content: center;">
                <button class="btn btn-outline-info" onclick="window.location = './searchGroomer.php';">Search By Groomer</button>
            </div>
        </div>
    </div>
    </div>

</body>


<script>
    
    var formVisible = 0;
    function searchByDateClick() {
        if (formVisible) {
            formVisible = 0;
            document.getElementById("datetimeForm").setAttribute("style", "visibility: hidden;")
        } else {
            formVisible = 1;
            document.getElementById("datetimeForm").setAttribute("style", "visibility: visible;")
        }
    }

    const today = (new Date()).toISOString().slice(0, 16); // get local current date
    document.getElementById("time").min = today;

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