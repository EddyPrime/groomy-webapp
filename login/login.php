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
</head>



<body>
  <!-- Pills content -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
      <form method="POST" action="log.php">
        <div class="text-center mb-3">
          <p>Sign in with:</p>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-facebook-f"></i>
          </button>
          <button type="button" class="btn btn-link btn-floating mx-1">
            <i class="fab fa-google"></i>
          </button>
        </div>
        <p class="text-center">or</p>
        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label"  for="loginName">Email</label>
          <input type="email" name = "email" id="loginName" class="form-control" />
        </div>
        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" name = "password" for="loginPassword">Password</label>
          <input type="password" name = "password" id="loginPassword" class="form-control" />
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
        <button type="button" class="btn btn-primary btn-block mb-4" onclick = "window.location='../signup/signup.php';">Sign up</button>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
        </div>
      </form>
    </div>
</body>

</html>