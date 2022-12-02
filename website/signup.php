<?php
// Include config file
require_once "./php/connection.php";


// Processing form data via $_POST
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$password = $_GET['password'];
$confirm_password = $_GET['confirm_password'];
$first_name_err = $last_name_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Validate username
  // if(empty(trim($_POST["email"]))){
  //     $username_err = "Please enter your email.";
  // } elseif(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', trim($_POST["email"]))){
  //     $username_err = "Please enter a vaild email.";
  // } else{
  //     // Prepare a select statement
  //     $sql = "SELECT email FROM users WHERE email = ?";

  //     if($stmt = mysqli_prepare($con, $sql)){
  //         // Bind variables to the prepared statement as parameters
  //         mysqli_stmt_bind_param($stmt, "s", $param_email);

  //         // Set parameters
  //         $param_email = trim($_POST["email"]);

  //         // Attempt to execute the prepared statement
  //         if(mysqli_stmt_execute($stmt)){
  //             /* store result */
  //             mysqli_stmt_store_result($stmt);

  //             if(mysqli_stmt_num_rows($stmt) == 1){
  //                 $email_err = "This email is already taken.";
  //             } else{
  //                 $email = trim($_POST["email"]);
  //             }
  //         } else{
  //             echo "Oops! Something went wrong. Please try again later.";
  //         }

  //         // Close statement
  //         //mysqli_stmt_close($stmt);
  //     }
  // }
  // Validate first name
  // if(empty(trim($_POST["first_name"]))){
  //   $first_name_err = "Please enter your first name.";
  // } else {
  //   $param_first_name = trim($_POST["first_name"]);
  // }


  // // Validate last name
  // if(empty(trim($_POST["last_name"]))){
  //   $last_name_err = "Please enter your last name.";
  // } else {
  //   $param_last_name = trim($_POST["last_name"]);
  // }

  // // Validate password
  // if(empty(trim($_POST["password"]))){
  //     $password_err = "Please enter a password.";     
  // } elseif(strlen(trim($_POST["password"])) < 6){
  //     $password_err = "Password must have at least 6 characters.";
  // } else{
  //     $password = trim($_POST["password"]);
  // }

  // // Validate confirm password
  // if(empty(trim($_POST["confirm_password"]))){
  //     $confirm_password_err = "Please confirm password.";     
  // } elseif (empty($password_err) && ($password != $confirm_password)){
  //     $confirm_password_err = "Password did not match.";
  // } else {
  //     $confirm_password = trim($_POST["confirm_password"]);
  // }

  // Check input errors before inserting in database
  if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO users (firstName, lastname, email, password) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($con, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ssss", $first_name, $last_name, $email, $password);

      // Set parameters
      $param_email = $email;

      $param_password = $password; // pass in the password without encryption
      // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Redirect to login page
        header("location: login.html");
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      //mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($con);
}
?>


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
</head>

<body>
  <!--Nav bar-->
  <nav class="outer-interface navbar navbar-expand-xl bg-info sticky-top px-5 py-5">
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
      <h1>Sign Up</h1>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="field">
          <input placeholder="First Name" type="text" id="first_name" class="form-control" name="first_name">
          <p id="firstNameError">
            <?php echo $first_name_err; ?>
          </p>
        </div>
        <div class="field">
          <input placeholder="Last Name" type="text" id="last_name" class="form-control"
            value="<?php echo $last_name; ?>" name="last_name">
          <p id="lastNameError" class="invalid-feedback">
            <?php echo $last_name_err; ?>
          </p>
        </div>
        <div class="field">
          <input placeholder="Email" type="text" id="email" class="form-control" name="email">
          <p id="emailError">
            <?php echo $email_err; ?>
          </p>
        </div>
        <div class="field">
          <input placeholder="Password" type="password" id="password" class="form-control" name="password">
          <p id="passwordError">
            <?php echo $password_err; ?>
          </p>
        </div>
        <div class="field">
          <input placeholder="Confirm Password" type="Password" id="confirm_password" class="form-control"
            name="confirm_password">
          <p id="confirmPasswordError">
            <?php echo $confirm_password_err; ?>
          </p>
        </div>
        <button id="submit" type="submit">Sign up</button>
      </form>
      <p class="">Already have an account?
        <a class="link" href="login.html">Login</a>
      </p>
    </div>
  </div>
  <script type="text/javascript" src="./js/auth.js"></script>
  <!--Footer-->
  <footer class="footer fixed-bottom d-flex flex-row-reverse bg-info ">
    <p class="p-2 bd-highlight flex-end text-light">2022 Expense Tracker Pro</p>
  </footer>
  <!-- Bootstrap Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>