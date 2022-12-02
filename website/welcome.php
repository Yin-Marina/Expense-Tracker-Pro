<?php
// start the session
session_start();
// If the user is not logged in redirect to the login page.
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

require "./php/connection.php";

// Query the Database for number of transactions that need to be displayed in the dashboard.
$stmt1 = $con->prepare('SELECT count(*) FROM transactions WHERE userId = ?');
$stmt1->bind_param('i', $_SESSION['id']);
$stmt1->execute();
$stmt1->bind_result($transactions_num);
$stmt1->fetch();
$stmt1->close();

// Query the Database for sum of amount that need to be displayed in the dashboard.
$stmt2 = $con->prepare('SELECT sum(amount) FROM transactions WHERE userId = ?');
$stmt2->bind_param('i', $_SESSION['id']);
$stmt2->execute();
$stmt2->bind_result($total_spending);
$stmt2->fetch();
$stmt2->close();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Welcome</title>

	<!-- Bootstrap Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

	<!--  Bootstrap Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
		integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Header/footer Stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<!-- Page specific stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/index.css" />

	<link rel="icon" href="favicon.ico" />

	<!-- Bootstrap Latest JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
		integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
		integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
		crossorigin="anonymous"></script>

</head>

<body class="loggedin bg-light">
	<!--Nav bar-->
	<?php
    require "./php/nav_inner.php"
    	?>

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

	<!-- footer -->
	<?php
    require "./php/footer_outer.php"
    	?>

</body>

</html>