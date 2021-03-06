<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
  <title>Sign up</title>

  <link rel="stylesheet" type="text/css" href="../style/reset.css">
  <link rel="stylesheet" type="text/css" href="../style/fonts.css">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>

  <div class="container">

    <button type="button" class="btn btn-info btn-block go-back-btn" onclick="window.location.href='../login/login.php';">
      <img src="../img/arrow-left.svg" style="color: white !important;"></img>
    </button>
    <!-- Pills content -->
    <div class="tab-content text-center">
      <h1 style="font-weight: bold ;">Sign up</h1>
      <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="POST" action="sign.php" class="sign-up-form">
          <div class="text-center mb-3">
            <!-- Name input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="registerName">Name</label>
              <input type="text" name="name" id="registerName" class="form-control" />

            </div>

            <!-- Surname input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="registerSurname">Surname</label>
              <input type="text" name="surname" id="registerSurname" class="form-control" />

            </div>


            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="registerEmail">Email</label>
              <input type="email" name="email" id="registerEmail" class="form-control" />
            </div>

            <!-- Telephone number input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="registerTelephone">Phone Number</label>
              <input type="tel" name="phoneNumber" id="registerphone" class="form-control" maxlength="10" />
            </div>

            <!-- Password input -->
            <div class="row">
              <label class="form-label" for="registerPassword">Password
                <img src="../img/question-circle-fill.svg" id="howToPassword"></img>
              </label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="registerPassword" class="form-control" oninput="matchPasswords()" />
            </div>


            <!-- Repeat Password input -->
            <label class="form-label" for="registerRepeatPassword">Confirm password</label>
            <div class="input-group form-outline text-center">
              <input type="password" name="repeatPassword" id="registerRepeatPassword" class="form-control" oninput="matchPasswords()" />
              <span class="input-group-text">
                <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer"></i>
              </span>
            </div>


            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
              <input class="form-check-input me-2" type="checkbox" value="" id="groomerCheck" aria-describedby="groomerCheckHelpText" />
              <label class="form-check-label" for="groomerCheck">
                I am a pet groomer
              </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Sign up</button>
            <h6>By clicking on sign up, you are agreeing to our terms and conditions</h6>
          </div>
        </form>
      </div>
    </div>
    <!-- Pills content -->

  </div>

</body>

<script>
  var passwordsClicked = 0;

  const firstNameInput = document.getElementById("registerName");
  const lastNameInput = document.getElementById("registerSurname");
  const emailInput = document.getElementById("registerEmail");
  const phoneNumberInput = document.getElementById("registerphone");
  const passwordInput = document.getElementById("registerPassword");
  const confirmPasswordInput = document.getElementById("registerRepeatPassword");
  const togglePassword = document.getElementById("togglePassword");
  const howToPassword = document.getElementById("howToPassword");
  const passwordHint = document.getElementById("passwordHint");

  function resetPasswordFields() {
    if (!passwordsClicked && passwordInput.type == "password") {
      passwordInput.value = "";
      confirmPasswordInput.value = "";
      passwordsClicked = 1;
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
  togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    confirmPasswordInput.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
  });


  howToPassword.addEventListener("click", function() {
    alert('Password should have at least 5 character. \nPassword should contain at least a letter. \nPassword should contain at least a capital letter. \nPassword should contain at least a symbol.');
  });
</script>

</html>