<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to ExpenseTrackerPro</title>

  <!-- Bootstrap Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <!--  Bootstrap Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Header/footer Stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />

  <link rel="icon" href="favicon.ico" />

  <!-- Bootstrap Latest JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
</head>

<body class="bg-light" id="index-body">
  <!--Nav bar-->
  <?php
  require "./php/nav_outer.php"
    ?>

  <!--Intro-->
  <div class="container d-flex flex-column mb-3">
    <div class="vertical-box p-2">
    </div>
    <h1 class="vertical-box display-1 p-2">Track your expense, anytime,
      everywhere</h1>

    <div class="p-2 d-flex justify-content-left">
      <a class="button text-center text-light text-decoration-none" href="./signup.php" role="button"> <span
          class="h2">signup</span> </a>
    </div>
  </div>

  <!-- footer -->
  <?php
  require "./php/footer_outer.php"
    ?>

</body>

</html>