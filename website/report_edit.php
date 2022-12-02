<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Group6">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
      rel="stylesheet" />

    <!-- Bootstrap Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--  Bootstrap Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Header/footer Stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/font-style.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css/report.css"> -->
  </head>
  <body>
    <?php
      include("nav.php");
      require_once('php/database.php');
      session_start();

      if(!isset($_GET['id'])) { //check if we get the id
        header("Location:  report.php");
      }
      $id = $_GET['id'];
      $db = db_connect();
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $date = $_POST['date']; 
        $amount= $_POST['amount'];
        $typeId= $_POST['typeId'];
        $notes= $_POST['notes'];
        //update the table with new information
        $sql="UPDATE transactions set date = '$date' , amount= '$amount' , typeId= '$typeId' , notes= '$notes' where id = '$id' ";
        $result = mysqli_query($db, $sql);
        //redirect to show page
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

      <a class="back-link" href="report.php"> Back to List</a>

      <div class="page edit">
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
                <option value=1 <?php echo $result['typeId'] == 1 ? 'selected' : '' ?>>Grocery</option>
                <option value=2 <?php echo $result['typeId'] == 2 ? 'selected' : '' ?>>Entertainment</option>
                <option value=3 <?php echo $result['typeId'] == 3 ? 'selected' : '' ?>>Other</option>
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
  </body>
</html>
