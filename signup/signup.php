<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
  <title>Sign up</title>

  <link rel="stylesheet" type="text/css" href="./style/reset.css">
  <link rel="stylesheet" type="text/css" href="./style/fonts.css">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
</head>

<body>

  
  <div>
      <button type="button" class="btn btn-primary btn-block mb-3" onclick = "window.location.href='../login/login.php';"> Back </button>
  </div>
  <!-- Pills content -->
  <div class="tab-content">
    
    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
      <form>
        <div class="text-center mb-3">
          <p>Sign up</p>
          
          

        <!-- Name input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerName">Name</label>
          <input type="text" id="registerName" class="form-control" />
          
        </div>

        <!-- Surname input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerSurname">Surname</label>
          <input type="text" id="registerSurname" class="form-control" />
          
        </div>


        <!-- Email input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerEmail">Email</label>
          <input type="email" id="registerEmail" class="form-control" />
        </div>

         <!-- Telephone number input -->
         <div class="form-outline mb-4">
          <label class="form-label" for="registerTelephone">Telephone</label>
          <input type="tel" id="registerTelephone" class="form-control" />
        </div>

        

        <!-- Password input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="registerPassword">Password</label>
          <input type="password" id="registerPassword" class="form-control" />
          
        </div>

        <!-- Repeat Password input -->
        <div class="form-outline mb-4">
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
          <input type="password" id="registerRepeatPassword" class="form-control" />
          
        </div>

        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
          <input class="form-check-input me-2" type="checkbox" value="" id="groomerCheck" checked aria-describedby="groomerCheckHelpText" />
          <label class="form-check-label" for="groomerCheck">
            I am a pet groomer
          </label>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
      </form>
    </div>
  </div>
  <!-- Pills content -->
</body>

</html>