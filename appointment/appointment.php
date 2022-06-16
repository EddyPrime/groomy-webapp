<?php 

/* retrieve pet from pets.txt file */
session_start();

$email = $_SESSION['email'];
$pet_name = $_GET['pet_name'];
$groomer = $_GET['groomer'];


/* retrieve pet informations */
$petsFile = "../db/pets.txt";
$pets = explode("\n", file_get_contents($petsFile));
for ($i = 0; $i < count($pets); $i++) {
    $infoElementArray = explode(";", $pets[$i]);
    if ($infoElementArray[0] == $email && $infoElementArray[1] == $pet_name) {
        //PET FOUND --> retrieve img and infos
        if ( strpos($infoElementArray[11], 'default' ) !== false ){
            $img = '../img/pet.svg';
        } else {
            $img = $infoElementArray[11];
        }

        $pet_race = $infoElementArray[2];
        $pet_weight = $infoElementArray[3];
        $pet_size = $infoElementArray[4];
        $pet_hair = $infoElementArray[5];
        $pet_behaviours = $infoElementArray[6];
        $pet_fears = $infoElementArray[7];
        $pet_contests = $infoElementArray[8];
        $pet_groomed = $infoElementArray[9];
        $pet_comfortable = $infoElementArray[10];

        if ( $pet_contests == 1 ){
            $pet_contests = 'Yes';
        } else {
            $pet_contests = 'No';
        }

        if ( $pet_groomed == 1 ){
            $pet_groomed = 'Yes';
        } else {
            $pet_groomed = 'No';
        }

        if ( $pet_comfortable == 1 ){
            $pet_comfortable = 'Yes';
        } else {
            $pet_comfortable = 'No';
        }

    }
}

/* retrieve appointment details */
/* retrieve pet informations */

$appointmentsFile = "../db/appointments.txt";
$appointments = explode("\n", file_get_contents($appointmentsFile));
for ($i = 0; $i < count($appointments); $i++) {
    $infoElementArray = explode(";", $appointments[$i]);
    if ($infoElementArray[0] == $email && $infoElementArray[1] == $pet_name && $infoElementArray[2] == $groomer ) {
        //APPOINTMENT FOUND --> retrieve infos
        $address = $infoElementArray[3];
        $hour = $infoElementArray[4];
        $date = $infoElementArray[5];
        $appointment_status = $infoElementArray[6];
        //echo $appointment_status;
        $lavaggio = $infoElementArray[7];
        //lavaggio;taglio_pelo;taglio_unghie;spa;anti_parassitari;acconciatura_concorsi
        $taglio_pelo = $infoElementArray[8];
        $taglio_unghie = $infoElementArray[9];
        $spa = $infoElementArray[10];
        $antiparassitari = $infoElementArray[11];
        $acconciatura_concorsi = $infoElementArray[12];
        $notes = $infoElementArray[13];
        /* TO DO: services */
    }
}

?>

<!doctype html>
<html>

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Groomy This is the appointment page.</title>

    <?php
    include_once("../navbar/navbar.php");
    //session_start();
    ?>
    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>
    
    <div class="container appointment-page">
        <button type="button" class="btn btn-info btn-block go-back-btn" onclick="window.location.href='../home/home.php'">
            <img src="../img/arrow-left.svg" style="color: white !important;"></img>
        </button>
        <div>

            <h1 style="font-weight: bold ;" class="text-center">Appointment details</h1>
            <?php 
            echo '<div class="form-outline mb-1">Date: ' . $date . '</div>';
            echo '<div class="form-outline mb-1">Hour: ' . $hour . '</div>';
            echo '<div class="form-outline mb-1">Pet groomer: ' . $groomer . '</div>';
            echo '<div class="form-outline mb-1">Address: ' . $address . '</div>';
            echo '<div class="form-outline mb-2">
                    <img src="../img/map.jpeg" style="width:100%">
                    </div>';
            echo '<div class="form-outline mb-1"><strong>Pet Info</strong></div>';
            echo '<div class="form-outline mb-1">Name: ' . $pet_name . '</div>';
            echo '<div class="form-outline mb-1">Race: ' . $pet_race . '</div>';
            echo '<div class="form-outline mb-1">Weight: ' . $pet_weight . '</div>';
            echo '<div class="form-outline mb-1">Size: ' . $pet_size . '</div>';
            echo '<div class="form-outline mb-1">Hair: ' . $pet_hair . '</div>';
            echo '<div class="form-outline mb-1"><strong>Services:</strong></div>';
            ?>
            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="lavaggio" onclick="return false;" <?php if ($lavaggio == 1){ echo 'checked'; }?>>
            <label class="form-check-label" for="flexCheckDefault">
                Wash
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="taglio_pelo" onclick="return false;" <?php if ($taglio_pelo == 1){ echo 'checked'; }?>>
            <label class="form-check-label" for="flexCheckDefault">
                Hair cut
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="taglio_unghie" onclick="return false;" <?php if ($taglio_unghie == 1){ echo 'checked'; }?>>
            <label class="form-check-label" for="flexCheckDefault">
                Nails cut
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="spa" onclick="return false;" <?php if ($spa == 1){ echo 'checked'; }?>>
            <label class="form-check-label" for="flexCheckDefault">
                SPA treatment
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="anti_parassitari" onclick="return false;" <?php if ($antiparassitari == 1){ echo 'checked'; }?>>
            <label class="form-check-label" for="flexCheckDefault">
                Anti Parasitic
            </label>
            </div>

            <div class="form-check">
            <input class="form-check-input" type="checkbox" id="acconciatura_concorsi" onclick="return false;" <?php if ($acconciatura_concorsi == 1){ echo 'checked'; }?>>
            <label class="form-check-label" for="flexCheckDefault">
                Contest Preparation
            </label>
            </div>

            <?php
                
                    echo '<button class="btn btn-lg btn-primary btn-block mb-4 btn-danger"  type="button" onclick="deleteappointment(this)" name="delete_appointment" value="'. $groomer . ';' . $pet_name . '" ?>Delete Appointment</button>
                    ';
                
            ?>
        </div>
    </div>

</body>

</html>

<script>

function deleteappointment(obj) {
        value = obj.value
        info = value.split(";");
        //alert(info[1]);
        if (confirm("Are you sure you want to delete your pet?")) {
            var deleteAppointment = function() {
                $.ajax({
                    url: './delete_appointment.php',
                    type: 'GET',
                    data: {
                        groomer: info[0],
                        pet_name: info[1]
                    },
                    success: function(data) {
                        //window.location.reload();
                        console.log(data); // Inspect this in your console
                    },
                    complete: function(){
                        window.location = '../home/home.php';
                    }
                });
            };
            deleteAppointment();
            //setTimeout( window.location.reload(), 1000 );
        }
    }

    home.setAttribute("class", "nav-link");
    home.setAttribute("aria-current", "");

    booking.setAttribute("class", "nav-link");
    booking.setAttribute("aria-current", "");

    pets.setAttribute("class", "nav-link active");
    pets.setAttribute("aria-current", "");

    profile.setAttribute("class", "nav-link");
    profile.setAttribute("aria-current", "");
</script>