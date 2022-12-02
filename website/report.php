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
    <link rel="stylesheet" type="text/css" href="css/report.css">
    <script type="text/javascript" src="js/report.js" defer></script>
  </head>
  <body>
    <?php
      include("nav.php");
      require_once('php/database.php');
      session_start();

      $query = '';
      $from = '';
      $to = '';
      $sortType = '';
      $sortAmount = '';

      $db = db_connect();
      $sql = "SELECT transactions.id, date, amount, notes, name FROM transactions"
          . " join types on transactions.typeId = types.id and transactions.userId = " . $_SESSION['id'];
      if (isset($_GET['submit'])) {
        $query = $_GET['query'];
        $from = $_GET['from'];
        $to = $_GET['to'];
        $sortType = $_GET['sortType'];
        $sortAmount = $_GET['sortAmount'];

        if (!empty($query)) {
          $sql .= " and transactions.notes like '%$query%'"
              . " and types.name like '%$query%'";
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
      $results = mysqli_query($db, $sql);
    ?>

    <form method="get" action="report.php">
      <div class="container">
        <div class="searchWrap">
          <div class="search">
            <input type="text" class="searchInput" placeholder="Search for expenses" name="query" value="<?php echo $query; ?>">
            <button class="searchButton" type="submit" name="submit">Search</button>
          </div>
        </div>
        <div class="filters">
          <div class="filter">
            <div class="from">
              <label for="from">From:</label>
              <input id="from" type="date" name="from" value="<?php echo $from; ?>" max="<?php echo empty($to) ? '' : $to; ?>">
            </div>
            <div class="to">
              <label for="to">To:</label>
              <input id="to" type="date" name="to" value="<?php echo $to; ?>" min="<?php echo empty($from) ? '' : $from; ?>">
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
          </div>
        </div>
      </div>
    </form>

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
            <td><?php echo $row['date'] ?></td>
            <td>$<?php echo $row['amount'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['notes'] ?></td>
            <td><a href="<?php echo "report_edit.php?id=" . $row['id']; ?>">Edit</a></td>
            <td><a href="<?php echo "delete.php?id=" . $row['id']; ?>">delete</a></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </body>
</html>
