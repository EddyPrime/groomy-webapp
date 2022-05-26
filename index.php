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
  <?php
  if (isLoggedIn()) {
    redirect_to("./home/home.php");
  } else {
    redirect_to("./login/login.php");
  }
  ?>

</body>

</html>