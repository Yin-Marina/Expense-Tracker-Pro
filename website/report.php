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

  <title>input</title>

  <!-- Page specific stylesheet -->
  <link rel="stylesheet" type="text/css" href="./css/report.css" />

  <!-- Page specific javascript for validate -->
  <script type="text/javascript" src="js/report.js" defer></script>
</head>

<body>
  <?php
  include("./php/nav_user.php");

  $query = '';
  $from = '';
  $to = '';
  $sortType = '';
  $sortAmount = '';

  $sql = "SELECT transactions.id, date, amount, notes, name FROM transactions"
    . " join types on transactions.typeId = types.id and transactions.userId = " . $_SESSION['id'];
  if (isset($_GET['submit'])) {
    $query = $_GET['query'];
    $from = $_GET['from'];
    $to = $_GET['to'];
    $sortType = $_GET['sortType'];
    $sortAmount = $_GET['sortAmount'];

    if (!empty($query)) {
      $sql .= " and (transactions.notes like '%$query%'"
        . " or types.name like '%$query%')";
    }
    if (!empty($from)) {
      $sql .= " and transactions.date >= '$from'";
    }
    if (!empty($to)) {
      $sql .= " and transactions.date <= '$to'";
    }
    $sorts = [];
    if (!empty($sortType)) {
      array_push($sorts, "types.name $sortType");
    }
    if (!empty($sortAmount)) {
      array_push($sorts, "transactions.amount $sortAmount");
    }
    if (count($sorts) > 0) {
      $sql .= " order by " . implode(', ', $sorts);
    }
  }
  $results = mysqli_query($con, $sql);
  ?>
  <section class="bgimage">

    <div class="container bg-light p-5 object-fit-lg-contain border rounded">
      <form method="get" action="report.php">
        <div class="searchWrap">
          <div class="search">
            <input type="text" class="searchInput" placeholder="Search for expenses" name="query"
              value="<?php echo $query; ?>">

          </div>
        </div>
        <div class="filters">
          <div class="filter">
            <div class="from">
              <label for="from">From:</label>
              <input id="from" type="date" name="from" value="<?php echo $from; ?>"
                max="<?php echo empty($to) ? '' : $to; ?>">
            </div>
            <div class="to">
              <label for="to">To:</label>
              <input id="to" type="date" name="to" value="<?php echo $to; ?>"
                min="<?php echo empty($from) ? '' : $from; ?>">
            </div>
          </div>
          <div class="sorts">
            <div class="sort">
              <label for="sortType">Sort type by:</label>
              <select name="sortType" id="sortType">
                <option value="" <?php echo empty($sortType) ? 'selected' : ''; ?>>---</option>
                <option value="asc" <?php echo $sortType === 'asc' ? 'selected' : ''; ?>>Ascending order</option>
                <option value="desc" <?php echo $sortType === 'desc' ? 'selected' : ''; ?>>Descending order</option>
              </select>
            </div>
            <div class="sort">
              <label for="sortAmount">Sort amount by:</label>
              <select name="sortAmount" id="sortAmount">
                <option value="" <?php echo empty($sortAmount) ? 'selected' : ''; ?>>---</option>
                <option value="asc" <?php echo $sortAmount === 'asc' ? 'selected' : ''; ?>>Lowest to highest</option>
                <option value="desc" <?php echo $sortAmount === 'desc' ? 'selected' : ''; ?>>Highest to lowest</option>
              </select>
            </div>
            <button class="searchButton" type="submit" name="submit">Search</button>
          </div>
      </form>
    </div>

    <div class="container">
      <table>
        <tr>
          <th>Date</th>
          <th>Amount</th>
          <th>Type</th>
          <th>Memo</th>
          <th>&nbsp</th>
          <th>&nbsp</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($results)) { ?>
          <tr>
            <td>
              <?php echo $row['date'] ?>
            </td>
            <td>$
              <?php echo $row['amount'] ?>
            </td>
            <td>
              <?php echo $row['name'] ?>
            </td>
            <td>
              <?php echo $row['notes'] ?>
            </td>
            <td><a href="<?php echo "report_edit.php?id=" . $row['id']; ?>">Edit</a></td>
            <td><a href="<?php echo "report_delete.php?id=" . $row['id']; ?>">delete</a></td>
          </tr>
        <?php } ?>
      </table>
    </div>
    </div>
  </section>
  <!-- footer -->
  <?php
  require "./php/footer_user.php"
    ?>
</body>

</html>