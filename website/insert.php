<?php
// start the session
session_start();
// If the user is not logged in redirect to the login page.
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

require "./php/connection.php";

$grocery_type = $spending_date = $amount = $note = "";





mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Group6">
  <title>input</title>
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

<body>
  <!--Nav bar-->
  <?php
  require "./php/nav_inner.php"
    ?>
  <div class="container">
    <form name="form" action="insert_process.php" method="post" onsubmit="return validate();">
      <h1>Record Your Spending</h1>
      <div>
        <label for="select_type">Please select the Spending type:</label>
        <select name="select_type" id="select_type">
          <option value=1>Grocery</option>
          <option value=2>Entertainment</option>
          <option value=3>Other</option>
        </select>
      </div>

      <div class="dateField">
        <label for="spending_date">Please select the Spending date:</label>
        <input placeholder="date" type="date" id="date" name="spending_date">
      </div>

      <div class="amountField">
        <label for="add_amount">Please add the Income/Spending Amount:</label>
        <input placeholder="amount" type="number" id="amount" step="0.01" value="0.00" name="add_amount">
      </div>

      <div>
        <label for="add_note">Please add the Spending Note:</label>
        <textarea id="note" name="add_note" cols="25" rows="2"></textarea>
      </div>
      <button type="submit" id="submit" onclick="validate()">Submit</button>
      <button type="reset" id="reset">Reset</button>
    </form>
  </div>
  <!-- footer -->
  <?php
  require "./php/footer_outer.php"
    ?>


</body>

</html>