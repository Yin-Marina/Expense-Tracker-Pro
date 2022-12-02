<!DOCTYPE html>
<html>

<head>
  <!-- Apply website universal header -->
  <?php
  require_once "./php/header.php";
  ?>
  <title>Log In</title>

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="" />
</head>

<body>
  <!--Nav bar-->
  <?php
  require "./php/nav_outer.php"
    ?>

  <div class="container">
    <div class="wrap">
      <h1>Login</h1>
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
      <p class="footer">Don't have an account?
        <a class="link" href="signup.php">Sign up</a>
      </p>
    </div>
  </div>

  <!-- footer -->
  <?php
  require "./php/footer_outer.php"
    ?>

</body>

</html>