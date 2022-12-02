<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Group6">
  <title>Singup</title>
  
  <!-- Boootstrap Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <!-- Bootstrap Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Header/footer Stylesheet -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/font-style.css" />
  <link rel="stylesheet" type="text/css" href="css/auth.css">
  <script src="js/auth.js" defer></script>
</head>

<body>
  <!--Nav bar-->
  <nav class="outer-interface navbar navbar-expand-xl bg-info fixed-top px-5 py-5">
    <a class="navbar-brand" href="#">
      <span class="h2 text-light">Expense Tracker Pro</span>
    </a>
    <div class="collapse navbar-collapse d-flex justify-content-end ">
      <ul class="navbar-nav mr-auto d-flex justify-content-end pull-right h4">
        <li class="nav-item active">
          <a class="nav-link text-light h3" href="./index.html">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link text-light h3" href="login.html">Login</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link text-light h3" href="aboutUs.html">About us</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="wrap">
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
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
        <button id="submit" type="submit">Sign up</button>
      </form>
      <p class="">Already have an account?
        <a class="link" href="login.html">Login</a>
      </p>
    </div>
  </div>
  <!--Footer-->
<!--  <footer class="footer fixed-bottom d-flex flex-row-reverse bg-info ">
    <p class="p-2 bd-highlight flex-end text-light">2022 Expense Tracker Pro</p>
  </footer> -->
  <!-- Bootstrap Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

