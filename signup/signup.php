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


  <div>
    <button type="button" class="btn btn-primary btn-block mb-3" onclick="window.location.href='../login/login.php';"> Back </button>
  </div>
  <!-- Pills content -->
  <div class="tab-content">

    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
      <form method="POST" action="sign.php">
        <div class="text-center mb-3">
          <p>Sign up</p>



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
            <input type="tel" name="phoneNumber" id="registerphone" class="form-control" />
          </div>



          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="registerPassword">Password</label>
            <input type="password" name="password" id="registerPassword" class="form-control" oninput="matchPasswords()" />

          </div>
          <i class="fa fa-question-circle" id="howToPassword">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12228 12228">
              <!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) -->
              <path d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z" />
            </svg>
            <span id="passwordHint" class="hint" style="display: none;">
              Password should have at least 5 character.
              Password should contain at least a letter.
              Password should contain at least a capital letter.
              Password should contain at least a symbol.
            </span>
          </i>

          <!-- Repeat Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="registerRepeatPassword">Confirm password</label>
            <span>
              <input type="password" name="repeatPassword" id="registerRepeatPassword" class="form-control" oninput="matchPasswords()" />
            </span>
            <span>
              <i class="bi bi-eye-slash" id="togglePassword"></i>
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
          <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
      </form>
    </div>
    <h6>By clicking on sign up, you are agreeing to our terms and conditions</h6>
  </div>
  <!-- Pills content -->
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

  var hintOn = 0;
  howToPassword.addEventListener("click", function() {
    if (hintOn) {
      hintOn = 0;
      passwordHint.style = "display : none;";
    } else {
      hintOn = 1;
      passwordHint.style = "display : block;";
    }
  });
</script>

</html>