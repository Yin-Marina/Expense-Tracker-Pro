<?php
$host = "127.0.0.1:3307";
// Specified port as the default is taken from the MySQL server.
$user = "root";
$password = '';
$db_name = "expense_tracker_pro";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}
?>