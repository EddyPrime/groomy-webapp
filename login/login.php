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
  <link 
  href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">

</head>



<body>
  <!-- Pills content -->
  <div class="tab-content container text-center">
    <h1 style="font-weight: bold ;">Groomy</h1>
    <p>Take care of your pets</p>
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form method="POST" action="log.php" class="login-form">
        <!-- Email input -->
        <label class="form-label" for="loginName">Email</label>
        <div class="input-group form-outline text-center">
          <input type="email" name="email" id="loginName" class="form-control" />
        </div>

        <!-- Password input -->
        <label class="form-label" name="password" for="loginPassword">Password</label>
        <div class="input-group form-outline text-center">
          <input type="password" name="password" id="loginPassword" class="form-control" />
          <span class="input-group-text">
            <i class="bi bi-eye-slash" id="togglePassword" 
          style="cursor: pointer"></i>
          </span>
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
        <div class="form-outline">
          <!-- Submit button -->
          <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">Login</button>
        </div>

        <div class="form-outline mb-2 row">
          <div class="col">
            <button type="button" class="btn">
              <img src="../img/facebook.svg"></img>
            </button>
          </div>
          <div class="col">
            <button type="button" class="btn">
            <img src="../img/google.svg"></img>
            </button>
          </div>
          
        </div>
        
        <p class="text-center">or</p>
        <div class="form-outline mb-4">
          <!-- Register buttons -->
          <button type="button" class="btn btn-lg btn-primary btn-block mb-4" onclick="window.location='../signup/signup.php';">Sign up</button>
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