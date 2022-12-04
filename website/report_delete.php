<?php
// start the session
session_start();
// If the user is not logged in redirect to the login page.
if (!isset($_SESSION['loggedin'])) {
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Apply website universal header -->
  <?php
  require_once "./php/header.php";
  ?>
  <title>Report Delete</title>
  <link rel="stylesheet" type="text/css" href="css/report.css">
</head>

<body>
  <?php
    include("./php/nav_outer.php");
    require_once('php/database.php');

    if (!isset($_GET['id'])) {
      header("Location: report.php");
    }
    $id = $_GET['id'];
    $db = db_connect();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $sql = "DELETE FROM transactions WHERE id = '$id'";
      $result = mysqli_query($db, $sql);
      // redirect to the report page
      header("Location: report.php");
    } else {
      $sql = "SELECT transactions.id, date, amount, notes, name FROM transactions"
        . " join types on transactions.typeId = types.id"
        . " and transactions.id = $id";
      $result_set = mysqli_query($db, $sql);
      $result = mysqli_fetch_assoc($result_set);
    }
    ?>
  <div class="container">
    <a href="report.php">&laquo; Back to List</a>
    <div>
      <h1>Delete Transaction</h1>
      <p>Are you sure you want to delete this transaction?</p>
      <p>
        <?php echo "Date: " . $result['date'] ?>
      </p>
      <p>
        <?php echo "Amount: " . $result['amount'] ?>
      </p>
      <p>
        <?php echo "Type: " . $result['name'] ?>
      </p>
      <p>
        <?php echo "Memo: " . $result['notes'] ?>
      </p>

      <form form action="<?php echo 'report_delete.php?id=' . $result['id']; ?>" method="post">
        <div id="operations">
          <input type="submit" name="commit" value="Delete Transaction" />
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
