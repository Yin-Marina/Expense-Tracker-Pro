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
  <!-- Apply website universal header -->
  <?php
  require_once "./php/header.php";
  ?>

  <title>input</title>

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="./css/input.css" />
  <script src="js/input.js" defer></script>
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