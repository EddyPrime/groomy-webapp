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

    <?php
    include "../navbar/navbar.php";
    ?>
</head>

<body>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <label class="labels">Name:</label>
                                <label id="firstName"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last name:</label>
                            <label id="lastName"></label>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email:</label>
                            <label id="email"></label>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Phone number:</label>
                            <label id="phoneNumber"></label>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <a href="profile_edit.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    document.getElementById("firstName").innerHTML = sessionStorage.getItem("name");
    document.getElementById("lastName").innerHTML = sessionStorage.getItem("surname");
    document.getElementById("email").innerHTML = sessionStorage.getItem("email");
    document.getElementById("phoneNumber").innerHTML = sessionStorage.getItem("phoneNumber");
</script>

</html>