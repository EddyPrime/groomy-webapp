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

    <div class="container">
        <h1 style="font-weight: bold ; text-align: center;">PROFILE EDIT</h1>

        <div class="text-center mb-3">



            <div class="form-outline mb-4">
                <label class="labels">Name</label>
                <input id="firstNameInput" type="search" class="form-control" placeholder="First name" value="">
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Last name</label>
                <input id="lastNameInput" type="search" class="form-control" value="" placeholder="Last name">
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Phone number</label>
                <input id="phoneNumberInput" type="search" class="form-control" placeholder="Phone number" value="">
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Email</label>
                <input id="emailInput" type="text" class="form-control" placeholder="Email" value="" readonly>
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Password</label>
                <img src="../img/question-circle-fill.svg" id="howToPassword"></img>
                <div class="input-group form-outline text-center">
                    <input id="passwordInput" type="password" class="form-control" placeholder="Password" value="" oninput="matchPasswords()">
                    <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                    </span>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="labels">Confirm Password</label>
                <div class="input-group form-outline text-center">
                    <input id="confirmPasswordInput" type="password" class="form-control" placeholder="Confirm password" value="" oninput="matchPasswords()">
                    <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="togglePassword2" style="cursor: pointer"></i>
                    </span>
                </div>

            </div>
        </div>
            <button class="btn btn-lg btn-primary btn-block mb-4 btn-danger" style="margin-left:15%" type="button" onclick="window.location.href='./profile.php';">Cancel</button>
            <button class="btn btn-lg btn-primary btn-block mb-4" style="margin-left:20%" type="button" onclick="saveChanges()">Save</button>
    
            <button class="btn btn-lg btn-primary btn-block mb-4 btn-danger" style="margin-left:30%" type="button" onclick="deleteAccount()">Delete Account</button>
        
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
    const togglePassword2 = document.getElementById("togglePassword2");
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
        togglePassword2.classList.toggle("bi-eye");
    });

    togglePassword2.addEventListener("click", function() {
        // toggle the type attribute
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);
        confirmPasswordInput.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
        togglePassword.classList.toggle("bi-eye");
    });


   
    howToPassword.addEventListener("click", function() {
        alert('Password should have at least 5 character. \nPassword should contain at least a letter. \nPassword should contain at least a capital letter. \nPassword should contain at least a symbol.');
    });

    firstNameInput.value = sessionStorage.getItem("name");
    lastNameInput.value = sessionStorage.getItem("surname");
    emailInput.value = sessionStorage.getItem("email");
    phoneNumberInput.value = sessionStorage.getItem("phoneNumber");
    passwordInput.value = sessionStorage.getItem("password");
    confirmPasswordInput.value = sessionStorage.getItem("password");
</script>

</html>