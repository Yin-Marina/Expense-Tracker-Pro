<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html>

<head>
	<!-- Apply website universal header -->
	<?php
    require_once "./php/header.php";
    ?>

  <title>Welcome to ExpenseTrackerPro</title>

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
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