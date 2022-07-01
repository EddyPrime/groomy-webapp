<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <?php
    include "../navbar/navbar.php";
    //$user_name = $_SESSION["name"];

    ?>

    <script>
        home.setAttribute("class", "nav-link active");
        home.setAttribute("aria-current", "page");

        booking.setAttribute("class", "nav-link");
        booking.setAttribute("aria-current", "");

        pets.setAttribute("class", "nav-link");
        pets.setAttribute("aria-current", "");

        profile.setAttribute("class", "nav-link");
        profile.setAttribute("aria-current", "");
    </script>
</head>

<body>
    <div class="container text-center homepage">
        <?php
        session_start();
        echo '<h1 style="font-weight: bold ;">Hi ' . $_SESSION["name"] . '!</h1>'; ?>
        <p>Here you can see the summary of your appointments!</p>
        <p>By clicking on each box, you can see all the details of the appointment and even delete it!</p>
        <div class="appointments-list">
            <?php
            $txt_file = fopen('../db/appointments.txt', 'r');
            $count = 1;
            $printed = 0;

            echo '<ol>';

            while ($line = fgets($txt_file)) {
                $line = trim($line);
                $info = explode(";", $line);
                //echo $line;
                //echo $info[0];
                //print_r( $info );
                if ($count != 1 && $line != '' && $info[0] == $_SESSION['email']) {
                    $status = $info[6];
                    $class = '';
                    $date = $info[5];
                    $hour = $info[4];
                    $groomer = $info[2];
                    $pet = $info[1];
                    $address = $info[3];

                    if ($status == 0) {
                        $class = 'to-confirm';
                    } else if ($status == 1) {
                        $class = 'confirmed';
                    } else {
                        $class = 'denied';
                    }

                    if ($date < '20' . date('y-m-d')) {
                        $class = 'passed';
                    }
                    
                    if ( $class != 'passed' ){
                        echo '<li>
                            <div class="appointment-info ' . $class . '" >
                                <a href="../appointment/appointment.php?groomer=' . $groomer . '&pet_name=' . $pet . '&date=' . $date . '"> 
                                    Groomer: <span id="name">' . $groomer . '</span><br> Address: ' . $address . '<br> Pet: ' . $pet . '<br> Date: ' . $date . '<br>Hour: ' . $hour . '  
                                </a>
                                <button class="btn-delete-appointment btn btn-lg btn-primary btn-block mb-4 btn-danger" style="margin-top: 5%;" type="button" onclick="deleteappointment(this)" name="delete_appointment" value="'. $groomer . ';' . $pet . ';' . $date . '"><i class="fa-solid fa-trash-can"></i></button> 
                            </div>
                        </li>';
                    } else {
                        echo '<li>
                            <div class="appointment-info ' . $class . '" >
                                <a href="../appointment/appointment.php?groomer=' . $groomer . '&pet_name=' . $pet . '&date=' . $date . '"> 
                                    Groomer: <span id="name">' . $groomer . '</span><br> Address: ' . $address . '<br> Pet: ' . $pet . '<br> Date: ' . $date . '<br>Hour: ' . $hour . '  
                                </a> 
                            </div>
                        </li>';

                    }
                    
                    $printed++;
                }

                $count++;
            }
            fclose($txt_file);
            echo '</ol>';
            if ($printed == 0) {
                echo '<p> You don\'t have any appointment!</p>';
            }
            ?>
            </ul>
        </div>
    </div>


</body>

</html>

<script>
function deleteappointment(obj) {
    value = obj.value
    info = value.split(";");
    parameter1 = info[0];
    parameter2 = info[1];
    parameter3 = info[2];
    //alert(info[1]);
    if (confirm("Are you sure you want to delete your appointment?")) {
        var deleteAppointment = function() {
            $.ajax({
                url: '../appointment/delete_appointment.php',
                type: 'GET',
                data: {
                    groomer: parameter1,
                    pet_name: parameter2,
                    date: parameter3
                },
                success: function(data) {
                    //window.location.reload();
                    console.log(data); // Inspect this in your console
                },
                complete: function(){
                    window.location.reload();
                }
            });
        };
        deleteAppointment();
        //setTimeout( window.location.reload(), 1000 );
    }
}


</script>
