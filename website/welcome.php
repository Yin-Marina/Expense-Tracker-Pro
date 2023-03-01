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
	<!-- Apply website universal header -->
	<?php
	require_once "./php/header.php";
	?>

	<title>input</title>

	<!-- Page specific stylesheet -->
	<link rel="stylesheet" type="text/css" href="" />

</head>

<body class="">
	<!--Nav bar-->
	<?php
	require "./php/nav_user.php"
		?>

	<section class="bgimage ">
		<div class="card ">
			<h5 class="card-header">The number of Transactions you recorded:</h5>
			<div class="card-body">
				<h1>
					<?php
					echo $transactions_num;
					?>
				</h1>
			</div>
		</div>

		<div class="card ">
			<h5 class="card-header">Total Spending</h5>
			<div class="card-body">
				<h1>
					<?php
					echo round($total_spending, 2);
					?>
				</h1>
			</div>
		</div>
	</section>

	<!-- footer -->
	<?php
	require "./php/footer_user.php"
		?>

</body>

</html>