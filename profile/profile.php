<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>

    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <?php
    include "../navbar/navbar.php";
    ?>

    <script>
        home.setAttribute("class", "nav-link");
        home.setAttribute("aria-current", "");

        booking.setAttribute("class", "nav-link");
        booking.setAttribute("aria-current", "");

        pets.setAttribute("class", "nav-link");
        pets.setAttribute("aria-current", "");

        profile.setAttribute("class", "nav-link active");
        profile.setAttribute("aria-current", "page");
    </script>
</head>

<body>
    <div class="container">


        <h1 style="font-weight: bold ; text-align: center;">Profile</h1>
        <p style="text-align: center;">Here you can find all the information related to your account and you can modify it!</>
            <br><br><br>

        <div style="margin-left:5%;" class="text-left mb-4">
            <div class="form-outline mb-4">
                <label class="labels">Name:</label>
                <label id="firstName"></label>
            </div>

            <div class="form-outline mb-4">
                <label class="labels">Last name:</label>
                <label id="lastName"></label>
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Email:</label>
                <label id="email"></label>
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Phone number:</label>
                <label id="phoneNumber"></label>
            </div>
        </div>
        <div class="mt-5 text-center">
            <a href="profile_edit.php" class="btn btn-info btn-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-pencil-square" viewBox="0 1 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
                Edit
            </a>

            <a onclick="logout();" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span>
                <i class="fa fa-sign-out" style="font-size:24px"></i>
                Log out
            </a>
        </div>



    </div>
</body>

<script type="text/javascript" src="../functions/functions.js"></script>

<script>
    document.getElementById("firstName").innerHTML = sessionStorage.getItem("name");
    document.getElementById("lastName").innerHTML = sessionStorage.getItem("surname");
    document.getElementById("email").innerHTML = sessionStorage.getItem("email");
    document.getElementById("phoneNumber").innerHTML = sessionStorage.getItem("phoneNumber");

    function logout() {
        clearSessionStorage();
        window.location.href = '../index.php';
    }
</script>

</html>