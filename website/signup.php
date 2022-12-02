<!DOCTYPE html>
<html>

<head>

	<!-- Apply website universal header -->
	<?php
    require_once "./php/header.php";
    ?>
    <title>Sign Up</title></script>
    <link rel="stylesheet" type="text/css" href="css/auth.css" />
    <script src="js/auth.js" defer></script>

</head>

<body>
  <!--Nav bar-->
  <?php
  require "./php/nav_outer.php"
    ?>

  <div class="container">
    <div class="wrap">
      <h1>Sign Up</h1>
      <form action="signup_process.php" method="POST" onsubmit="return validateForm();">
        <div class="field">
          <input placeholder="First Name" type="text" id="first_name" class="form-control" name="first_name">
          <p id="firstNameError">
          </p>
        </div>
        <div class="field">
          <input placeholder="Last Name" type="text" id="last_name" class="form-control" name="last_name">
          <p id="lastNameError" class="invalid-feedback">
          </p>
        </div>
        <div class="field">
          <input placeholder="Email" type="text" id="email" class="form-control" name="email">
          <p id="emailError">
          </p>
        </div>
        <div class="field">
          <input placeholder="Password" type="password" id="password" class="form-control" name="password">
          <p id="passwordError">
          </p>
        </div>
        <div class="field">
          <input placeholder="Confirm Password" type="Password" id="confirm_password" class="form-control"
            name="confirm_password">
          <p id="confirmPasswordError">
          </p>
        </div>
        <button id="submit" type="submit" class="button">Sign up</button>
      </form>
      <p class="">Already have an account?
        <a class="link" href="login.php">Login</a>
      </p>
    </div>
  </div>
  
  <!-- footer -->
  <?php
  require "./php/footer_outer.php"
    ?>

</body>

