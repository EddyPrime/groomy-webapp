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

    <?php
    include "../navbar/navbar.php";
    //$user_name = $_SESSION["name"];
    //echo $user_name;
    ?>
</head>

<body>
    <div class="container">
        <h3 id="Welcome"></h3>
        <?php
            session_start();
            echo '<h3>Hi ' . $_SESSION["name"] . '!</h3>';?>
        <p>Here you can see all your appointments!</p>
        <div class="appointments-list">
            <?php
                $txt_file = fopen('../db/appointments.txt','r');
                $count = 1;
                $printed = 0;

                while ( $line = fgets($txt_file) ) {
                    $line = trim($line);
                    $info = explode( ";", $line );
                    //echo $line;
                    //echo $info[0];
                    //print_r( $info );
                    if ( $count != 1 && $line != '' && $info[0] == $_SESSION['email'] ){
                        $status = $info[5];
                        $class = '';
                        $date = $info[4];
                        $hour = $info[3];
                        $groomer = $info[2];
                        $pet = $info[1];

                        if ( $status == 0 ){
                            $class = 'to-confirm';
                        } else if ( $status == 1 ){
                            $class = 'confirmed';
                        } else {
                            $class = 'denied';
                        }

                        if ( $date < date('d-m-y') ){
                            $class = 'passed';
                        }

                        echo '<li>
                            <a href="../appointment/appointment.php?groomer='.$groomer.'&pet='.$pet.'"> 
                                <div class="appointment-info ' . $class . '" >
                                    Groomer: <span id="name">' . $groomer . '</span><br> Pet: ' . $pet . '<br> Date: ' . $date . '<br>Hour: ' . $hour . '  
                                </div>
                            </a>
                        </li>';
                        
                        $printed++;
                        
                    }
                    
                    $count++;
                }
                fclose($txt_file);

                if ( $printed == 0 ){
                    echo '<p> You don\'t have any appointment!</p>';
                }
            ?>
        </ul>
        </div>
    </div>
    

</body>

<script>
    home.setAttribute("class", "nav-link active");
    home.setAttribute("aria-current", "page");

    booking.setAttribute("class", "nav-link");
    booking.setAttribute("aria-current", "");

    pets.setAttribute("class", "nav-link");
    pets.setAttribute("aria-current", "");

    profile.setAttribute("class", "nav-link");
    profile.setAttribute("aria-current", "");

    //document.getElementById("Welcome").innerHTML = "Hi, "+sessionStorage.getItem("name");
</script>

</html>