<?php session_start(); ?>

<nav class="outer-interface navbar navbar-expand-xl bg-info fixed-top px-5 py-5">
  <a class="navbar-brand" href="#">
    <span class="h2 text-light">
      <p>Welcome back, <?= $_SESSION['name'] ?>!</p>
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
