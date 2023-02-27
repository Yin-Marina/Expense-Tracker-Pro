<!DOCTYPE html>
<html>

<head>
  <!-- Apply website universal header -->
  <?php
  require_once "./php/header.php";
  ?>
  <title>Log In</title>

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/auth.css" />
</head>

<body>
  <!--Nav bar-->
  <?php
  require "./php/nav.php"
    ?>

  <div class="bgimage">
    <div class="wrap col-lg-12 col-md-12 col-sm-12 col-xs-12 p-3 hero-text" id="login">
      <div class="">
        <h1 class="">Login</h1>
        <form action="authentication.php" method="POST">
          <div class="field">
            <input placeholder="Email" type="text" name="email" id="email">
            <p id="emailError"></p>
          </div>
          <div class="field">
            <input placeholder="Password" type="password" name="password" id="password">
            <p id="passwordError"></p>
          </div>
          <button class="button" type="submit">Login</button>
        </form>
        <p class="text-dark">Don't have an account?
          <a class="link" href="signup.php">Sign up</a>
        </p>
      </div>

    </div>
  </div>

  <!-- footer -->
  <?php
  require "./php/footer.php"
    ?>

</body>

</html>