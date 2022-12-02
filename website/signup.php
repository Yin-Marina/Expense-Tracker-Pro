<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Group6">
  <title>Singup</title>
  
  <!-- Bootstrap Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <!--  Bootstrap Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Header/footer Stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/auth.css" />

  <link rel="icon" href="favicon.ico" />

  <!-- Bootstrap Latest JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
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

