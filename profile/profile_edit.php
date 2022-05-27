<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>

    <link rel="stylesheet" type="text/css" href="./style/reset.css">
    <link rel="stylesheet" type="text/css" href="./style/fonts.css">
    <link rel="stylesheet" type="text/css" href="./style/style.css">
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
                        <h4 class="text-right">Edit Profile</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input id="firstNameInput" type="search" class="form-control" placeholder="First name" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Surname</label>
                            <input id="lastNameInput" type="search" class="form-control" value="" placeholder="Last name">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Phone number</label>
                            <input id="phoneNumberInput" type="search" class="form-control" placeholder="Phone number" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input id="emailInput" type="search" class="form-control" placeholder="Email" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Password</label>
                            <input id="passwordInput" type="password" class="form-control" placeholder="Password" value="" onclick="resetPasswordFields()" onchange="matchPasswords()">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirm Password</label>
                            <input id="confirmPasswordInput" type="password" class="form-control" placeholder="Confirm password" value="" onclick="resetPasswordFields()" onchange="matchPasswords()">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-warning profile-button" type="button" onclick="window.location.href='./profile.php';">Cancel</button>
                        <button class="btn btn-primary profile-button" type="button" onclick="saveChanges()">Save Changes</button>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-danger" type="button">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var passwordsClicked = 0;

    function resetPasswordFields() {
        if (!passwordsClicked) {
            document.getElementById("passwordInput").value = "";
            document.getElementById("confirmPasswordInput").value = "";
            passwordsClicked = 1;
        }
    }

    function matchPasswords() {
        var passowrd = document.getElementById("passwordInput").value;
        var confirmPassowrd = document.getElementById("confirmPasswordInput").value;

        if (passowrd == confirmPassowrd) {
            document.getElementById("passwordInput").style.borderColor = "green";
            document.getElementById("confirmPasswordInput").style.borderColor = "green";
            return true;
        }
        document.getElementById("passwordInput").style.borderColor = "red";
        document.getElementById("confirmPasswordInput").style.borderColor = "red";
        return false;
    }

    function saveChanges() {
        if (!matchPasswords()) {
            return;
        }

        sessionStorage.setItem("firstName", document.getElementById("firstNameInput").value);
        sessionStorage.setItem("lastName", document.getElementById("lastNameInput").value);
        sessionStorage.setItem("email", document.getElementById("emailInput").value);
        sessionStorage.setItem("phoneNumber", document.getElementById("phoneNumberInput").value);
        sessionStorage.setItem("password", document.getElementById("passwordInput").value);
        window.location.href = './profile.php';
    }

    sessionStorage.setItem("firstName", "firstName");
    sessionStorage.setItem("lastName", "lastName");
    sessionStorage.setItem("email", "email");
    sessionStorage.setItem("phoneNumber", "phoneNumber");
    sessionStorage.setItem("password", "password");

    document.getElementById("firstNameInput").value = sessionStorage.getItem("firstName");
    document.getElementById("lastNameInput").value = sessionStorage.getItem("lastName");
    document.getElementById("emailInput").value = sessionStorage.getItem("email");
    document.getElementById("phoneNumberInput").value = sessionStorage.getItem("phoneNumber");
    document.getElementById("passwordInput").value = sessionStorage.getItem("password");
    document.getElementById("confirmPasswordInput").value = sessionStorage.getItem("password");
</script>

</html>