<?php
//specify the server name and here it is localhost
$server_name = "localhost";

//specify the username - here it is root
$user_name = "root";

//specify the password - it is empty
$password = "";

//specify the database name - "my_company"
$database_name = "expense_tracker_pro";

// Creating the connection by specifying the connection details
$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

$grocery_type = $spending_date = $amount = $note = "";


//close the connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Group6">
  <title>input</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/input.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="css/font-style.css" />
  <link rel="stylesheet" type="text/css" href="css/index-style.css" />
  <!-- Bootstrap Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!--  Bootstrap Optional theme -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="js/input.js"  defer></script>
</head>

<body>

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

</body>

</html>