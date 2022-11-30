<?php
// Include config file
require_once "./php/connection.php";
 
// Define variables and initialize with empty values
$first_name = $last_name = $username = $password = $confirm_password = "";
$first_name_err = $last_name_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter your email.";
    } elseif(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', trim($_POST["email"]))){
        $username_err = "Please enter a vaild email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $username = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate first name
    if(empty(trim($_POST["firstName"]))){
        $first_name_err = "Please enter your first name.";
    }


    // Validate last name
    if(empty(trim($_POST["lastName"]))){
        $last_name_err = "Please enter your last name.";
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.html");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Group6">
  <title>Singup</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/auth.css">
  <!-- Boootstrap Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Bootstrap Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>

<body>
  <nav class="navbar navbar-expand-xl navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">
      <img src="./img/logo.png" width="20" height="20" class="d-inline-block align-top" alt="">
      Expense Tracker Pro

    </a>

    <div class="collapse navbar-collapse d-flex justify-content-end">
      <ul class="navbar-nav mr-auto d-flex justify-content-end">
        <li class="nav-item active">
          <a class="nav-link" href="./index.html">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="login.html">Login</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="">About us</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="wrap">
      <h1>Sign Up</h1>
      <form onsubmit="return validateForm();" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="field">
          <input placeholder="First Name" type="text" id="firstName">
          <p id="firstNameError"></p>
        </div>
        <div class="field">
          <input placeholder="Last Name" type="text" id="last_name" 
          class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" 
          value="<?php echo $last_name; ?>"
          name="last_name">
          <p id="lastNameError" class="invalid-feedback"><?php echo $last_name_err; ?></p>
        </div>
        <div class="field">
          <input placeholder="Email" type="text" id="email">
          <p id="emailError"></p>
        </div>
        <div class="field">
          <input placeholder="Password" type="password" id="password">
          <p id="passwordError"></p>
        </div>
        <div class="field">
          <input placeholder="Confirm Password" type="Password" id="confirm_password">
          <p id="confirmPasswordError"></p>
        </div>
        <button id="submit">Sign up</button>
      </form>
      <p class="footer">Already have an account?
        <a class="link" href="login.html">Login</a>
      </p>
    </div>
  </div>
  <script type="text/javascript" src="js/auth.js"></script>
  <!-- Bootstrap Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
</body>

</html>