<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Apply website universal header -->
  <?php
  require_once "php/header.php";
  ?>

  <title>Welcome to ExpenseTrackerPro</title>

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/index.css" />
</head>

<body class="">
  <!--Nav bar-->
  <?php 
  require "php/nav.php"  
  ?>

  <!--Profile-->

  <!-- main banner -->
  <section class="bgimage" id="home">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hero-text">
          <h2 class="hero_title">Track your expense</h2>
          <p class="hero_desc">Anytime, anywhere</p>
          <button type="button" class="btn btn-outline-light btn-lg" onclick="location.href='signup.php'">Sign up now</button>
        </div>
      </div>
    </div>
  </section>
  

  <!-- footer -->
  <?php
  require "./php/footer.php"
    ?>

</body>

</html>