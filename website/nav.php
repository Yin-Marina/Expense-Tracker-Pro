<?php
  // We need to use sessions, so you should always start sessions using the below code.
  session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;
  }
  require_once('php/database.php');
  $db = db_connect();
  $sql = "SELECT firstName, lastName, password, email FROM users WHERE id = " . $_SESSION['id'];
  $result_set = mysqli_query($db, $sql);
  $result = mysqli_fetch_assoc($result_set);
  $firstName = $result['firstName'];
  $lastName = $result['lastName'];
?>

<nav class="outer-interface navbar navbar-expand-xl bg-info sticky-top px-5 py-5">
  <a class="navbar-brand" href="#">
    <span class="h2 text-light">
      <p>Welcome back, <?= $firstName, ' ', $lastName ?>!</p>
    </span>
  </a>
  <div class="collapse navbar-collapse d-flex justify-content-end ">
    <ul class="navbar-nav mr-auto d-flex justify-content-end pull-right h4">
      <li class="nav-item active">
        <a class="nav-link text-light h3" href="./welcome.php">User Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light h3" href="profile.php">Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light h3" href="insert.html">New Spending</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light h3" href="report.php">View Report</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-light h3" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
