<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="../style/reset.css">
  <link rel="stylesheet" type="text/css" href="../style/fonts.css">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>



<body>
  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form method="POST" action="log.php">
        <div class="text-center mb-3">
          <p>Sign in with:</p>
        </div>
        <div class="form-outline mb-4">
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 30 30" style=" fill:#0000ff;">
              <path d="M12,2C6.477,2,2,6.477,2,12c0,5.013,3.693,9.153,8.505,9.876V14.65H8.031v-2.629h2.474v-1.749 c0-2.896,1.411-4.167,3.818-4.167c1.153,0,1.762,0.085,2.051,0.124v2.294h-1.642c-1.022,0-1.379,0.969-1.379,2.061v1.437h2.995 l-0.406,2.629h-2.588v7.247C18.235,21.236,22,17.062,22,12C22,6.477,17.523,2,12,2z"></path>
            </svg>
          </button>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
            <img class="google-icon-svg" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
          </button>
        </div>
        <p class="text-center">or</p>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="loginName">Email</label>
          <input type="email" name="email" id="loginName" class="form-control" />
        </div>
        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" name="password" for="loginPassword">Password</label>
          <input type="password" name="password" id="loginPassword" class="form-control" />
          <i class="bi bi-eye-slash" id="togglePassword"></i>
        </div>

        <!-- 2 column grid layout -->
        <div class="row mb-4">
          <div class="col-md-6 d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check mb-3 mb-md-0">
              <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
              <label class="form-check-label" for="loginCheck"> Remember me </label>
            </div>
          </div>

        </div>
        <div class="form-outline mb-4">
          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
        </div>
        <p class="text-center">or</p>
        <div class="form-outline mb-4">

          <!-- Register buttons -->
          <button type="button" class="btn btn-primary btn-block mb-4" onclick="window.location='../signup/signup.php';">Sign up</button>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!" onclick="forgotPassword() ">Forgot password?</a>
        </div>
      </form>
    </div>
</body>
<script>
  const passwordInput = document.getElementById("loginPassword");
  const togglePassword = document.getElementById("togglePassword");


  togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // toggle the icon
    this.classList.toggle("bi-eye");
  });


  function forgotPassword() {
    var res = window.prompt("Insert the email address for the password recovery procedure");
    if (res) {
      alert("An email has been sent to " + res);
    }
  }
</script>

</html>