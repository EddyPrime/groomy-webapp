<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">
  <title>Groomy</title>

  <link rel="stylesheet" type="text/css" href="./style/reset.css">
  <link rel="stylesheet" type="text/css" href="./style/fonts.css">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="stylesheet" type="text/css" href="./dist/css/bootstrap.min.css">

  <?php
  include "./functions/functions.php";
  include "./navbar/navbar.php";
  ?>
</head>

<body>

  <script>
    if (sessionStorage.getItem("loggedIn") == "0" || sessionStorage.getItem("loggedIn") == null) {
      window.location.href = "./login/login.php";
    } else {
      window.location.href = "./home/home.php";
    }
  </script>

</body>

</html>