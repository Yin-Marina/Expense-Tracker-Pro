<?php
// start the session
session_start();
// If the user is not logged in redirect to the login page.
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.html');
  exit;
}

require "./php/connection.php";



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
  <link rel="stylesheet" type="text/css" href="./css/report.css" />

  <!-- Page specific javascript for validate -->
  <script type="text/javascript" src="js/report.js" defer></script>
</head>

<body>
  <?php
  include("./php/nav_inner.php");
  require_once('php/database.php');

  if (!isset($_GET['id'])) { //check if we get the id
    header("Location:  report.php");
  }
  $id = $_GET['id'];
  $db = db_connect();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $typeId = $_POST['typeId'];
    $notes = $_POST['notes'];
    // update the table with new information
    $sql = "UPDATE transactions set date = '$date' , amount= '$amount' , typeId= '$typeId' , notes= '$notes' where id = '$id' ";
    $result = mysqli_query($db, $sql);
    // redirect to report page
    header("Location: report.php");
  } else {
    $sql = "SELECT transactions.id, date, amount, notes, types.id as typeId FROM transactions"
      . " join types on transactions.typeId = types.id"
      . " and transactions.id = $id";
    $result_set = mysqli_query($db, $sql);
    $result = mysqli_fetch_assoc($result_set);
  }
  ?>
  <div class="container">
    <a href="report.php">&laquo; Back to List</a>

    <div>
      <h1>Edit Transaction</h1>

      <form action="<?php echo 'report_edit.php?id=' . $result['id']; ?>" method="post">
        <dl>
          <dt>Date</dt>
          <dd><input type="date" name="date" value="<?php echo $result['date']; ?>" /></dd>
        </dl>
        <dl>
          <dt>Amount</dt>
          <dd><input type="text" name="amount" value="<?php echo $result['amount']; ?>" /></dd>
        </dl>
        <dl>
          <dt>Type</dt>
          <dd>
            <select name="typeId">
              <option value=1 <?php echo $result['typeId']==1 ? 'selected' : '' ?>>Grocery</option>
              <option value=2 <?php echo $result['typeId']==2 ? 'selected' : '' ?>>Entertainment</option>
              <option value=3 <?php echo $result['typeId']==3 ? 'selected' : '' ?>>Other</option>
            </select>
          </dd>
        </dl>
        <dl>
          <dt>Memo</dt>
          <dd>
            <textarea name="notes" cols="25" rows="2"><?php echo $result['notes']; ?></textarea>
          </dd>
        </dl>

        <div id="operations">
          <input type="submit" value="Edit Transaction" />
        </div>
      </form>
    </div>
  </div>
  <!-- footer -->
  <?php
  require "./php/footer_outer.php"
    ?>
</body>

</html>