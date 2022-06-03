<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>

    <link rel="stylesheet" type="text/css" href="../style/reset.css">
    <link rel="stylesheet" type="text/css" href="../style/fonts.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
                            <label class="labels">Last name</label>
                            <input id="lastNameInput" type="search" class="form-control" value="" placeholder="Last name">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Phone number</label>
                            <input id="phoneNumberInput" type="search" class="form-control" placeholder="Phone number" value="">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input id="emailInput" type="text" class="form-control" placeholder="Email" value="" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Password</label>
                            <input id="passwordInput" type="password" class="form-control" placeholder="Password" value="" oninput="matchPasswords()">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirm Password</label>
                            <input id="confirmPasswordInput" type="password" class="form-control" placeholder="Confirm password" value="" oninput="matchPasswords()">
                            <i class="bi bi-eye-slash" id="togglePassword"></i>
                            <i class="fa fa-question-circle" id="howToPassword">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12228 12228">
                                    <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
                                    <path d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z" />
                                </svg>
                                <span id="passwordHint" class="hint" style="display: none;">
                                Password should have at least 5 character.
                                Password should contain at least a digit.
                                Password should contain at least a letter.
                                Password should contain at least a capital letter.
                                Password should contain at least a symbol.
                            </span>
                            </i>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-warning profile-button" type="button" onclick="window.location.href='./profile.php';">Cancel</button>
                        <button class="btn btn-primary profile-button" type="button" onclick="saveChanges()">Save Changes</button>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-danger" type="button" onclick="deleteAccount()">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript" src="../functions/functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


<script>
    var passwordDeleted = 0;

    const firstNameInput = document.getElementById("firstNameInput");
    const lastNameInput = document.getElementById("lastNameInput");
    const emailInput = document.getElementById("emailInput");
    const phoneNumberInput = document.getElementById("phoneNumberInput");
    const passwordInput = document.getElementById("passwordInput");
    const confirmPasswordInput = document.getElementById("confirmPasswordInput");
    const togglePassword = document.getElementById("togglePassword");
    const howToPassword = document.getElementById("howToPassword");
    const passwordHint = document.getElementById("passwordHint");

    passwordInput.addEventListener('keydown', function(event) {
        const key = event.key; // const {key} = event; ES6+
        if (key === "Backspace" || key === "Delete") {
            resetPasswordFields()
        }
    });

    confirmPasswordInput.addEventListener('keydown', function(event) {
        const key = event.key; // const {key} = event; ES6+
        if (key === "Backspace" || key === "Delete") {
            resetPasswordFields()
        }
    });

    function resetPasswordFields() {
        if (!passwordDeleted && passwordInput.type == "password") {
            passwordInput.value = "";
            confirmPasswordInput.value = "";
            passwordDeleted = 1;
        }
    }

    function matchPasswords() {
        var password = passwordInput.value;
        var confirmPassword = confirmPasswordInput.value;

        if (password == confirmPassword) {
            passwordInput.style.borderColor = "green";
            confirmPasswordInput.style.borderColor = "green";
            return true;
        }
        passwordInput.style.borderColor = "red";
        confirmPasswordInput.style.borderColor = "red";
        return false;
    }

    function saveChanges() {
        if (!matchPasswords()) {
            return;
        }

        var editUser = function() {
            $.ajax({
                url: './edit_user.php',
                type: 'GET',
                data: {
                    email: sessionStorage.getItem("email"),
                    firstName: firstNameInput.value,
                    lastName: lastNameInput.value,
                    phoneNumber: phoneNumberInput.value,
                    password: passwordInput.value
                },
                success: function(data) {
                    console.log(data); // Inspect this in your console
                }
            });
        };
        editUser();

        sessionStorage.setItem("name", firstNameInput.value);
        sessionStorage.setItem("surname", lastNameInput.value);
        sessionStorage.setItem("phoneNumber", phoneNumberInput.value);
        sessionStorage.setItem("password", passwordInput.value);

        window.location.href = './profile.php';
    }

    function deleteAccount() {
        if (confirm("Are you sure you want to delete your account?")) {
            var deleteUser = function() {
                $.ajax({
                    url: './delete_user.php',
                    type: 'GET',
                    data: {
                        email: sessionStorage.getItem("email")
                    },
                    success: function(data) {
                        console.log(data); // Inspect this in your console
                    }
                });
            };
            deleteUser();
            clearSessionStorage();
            window.location.href = '../index.php';
        }
    }

    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        confirmPasswordInput.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    var hintOn = 0;
    howToPassword.addEventListener("click", function() {
        if (hintOn) {
            hintOn = 0;
            passwordHint.style = "display : none;";
        }
        else {
            hintOn = 1;
            passwordHint.style = "display : block;";
        }
    });

    firstNameInput.value = sessionStorage.getItem("name");
    lastNameInput.value = sessionStorage.getItem("surname");
    emailInput.value = sessionStorage.getItem("email");
    phoneNumberInput.value = sessionStorage.getItem("phoneNumber");
    passwordInput.value = sessionStorage.getItem("password");
    confirmPasswordInput.value = sessionStorage.getItem("password");
</script>

</html>