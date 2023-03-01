<?php
// start the session
session_start();
// If the user is not logged in redirect to the login page.
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}

require "./php/connection.php";

// Query the Database for user information that need to be displayed in the profile page.
$stmt = $con->prepare('SELECT firstName, lastName, password, email FROM users WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($firstName, $lastName, $password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>

<head>
	<!-- Apply website universal header -->
	<?php
    require_once "./php/header.php";
    ?>

	<title>Profile Page</title>
	<!-- Page specific stylesheet -->
	<link rel="stylesheet" type="text/css" href="" />
</head>

<body class="loggedin">
	<!--Nav bar-->
	<?php
    require "./php/nav_user.php"
    	?>
<section class="bgimage">

	<div class="card">
		<h2 class="card-header">Account Detail:</h2>
		<div class="card-body">
			<p class="card-title"></p>
			<table>
				<tr>
					<td>Username:</td>
					<td>
						<?= $firstName ?>
					</td>
					<td>
						<?= $lastName ?>
					</td>
				</tr>
				<tr>
					<td>Password:</td>
					<td>
						<?= $password ?>
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>
						<?= $email ?>
					</td>
				</tr>
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