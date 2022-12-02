<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}


require "./php/connection.php";
$stmt = $con->prepare('SELECT firstName, lastName, password, email FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $password, $email);
$stmt->fetch();
$stmt->close();


// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt2 = $con->prepare('SELECT count(*) FROM transactions WHERE userId = ?');
// In this case we can use the account ID to get the account info.
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($transactions_num);
$stmt2->fetch();
$stmt2->close();

$stmt3 = $con->prepare('SELECT sum(amount) FROM transactions WHERE userId = ?');
// In this case we can use the account ID to get the account info.
$stmt3->bind_param('i', $_SESSION['id']);
$stmt3->execute();
$stmt3->bind_result($total_spending);
$stmt3->fetch();

$stmt3->close();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Home Page</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
		rel="stylesheet" />


	<!-- Bootstrap Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />


	<!--  Bootstrap Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
		integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Header/footer Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/font-style.css" />
	<link rel="stylesheet" type="text/css" href="css/index.css" />

</head>

<body class="loggedin bg-light">


<!-- <nav class="navbar navbar-expand-xxl navbar-dark bg-dark" aria-label="Seventh navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Expand at xxl</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleXxl">
        <ul class="navbar-nav me-auto mb-2 mb-xl-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownXxl" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownXxl">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav> -->


	<!--Nav bar-->
	<nav class="navbar navbar-expand-xxl bg-info sticky-top px-5 py-5" aria-label="navbar">
		<div class="container-fluid">
		
		
		<a class="navbar-brand" href="#">
			<span class="h2 text-light">
				<p>Welcome back, <?= $firstName, ' ', $lastName ?>!</p>
			</span>
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleXxl" aria-controls="navbarsExampleXxl" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

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
		</div>
	</nav>

	<div class="card">
		<h5 class="card-header">The number of Transactions you recorded:</h5>
		<div class="card-body">
			<h1>
			<?php
            echo $transactions_num;
            ?>
			</h1>
		</div>

	</div>

	<div class="card">
		<h5 class="card-header">Total Spending</h5>
		<div class="card-body">
		<h1>
			<?php
            echo round($total_spending, 2);
            ?>
			</h1>
		</div>

	</div>
	<!--Footer-->
	<footer class="footer fixed-bottom d-flex flex-row-reverse bg-info ">
		<p class="p-2 bd-highlight flex-end text-light">2022 Expense Tracker Pro</p>
	</footer>
	<!-- Bootstrap Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>
</body>

</html>