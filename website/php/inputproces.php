<?php
$type = $_POST["type"];
$date = $_POST["date"];
$amount = $_POST["amount"];
$note = $_POST["note"];


$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname ='exp_pro';

$conn = mysqli_connect($host, $user, $password, $dbname); 

if (mysqli_connect_error()){
    die("Failed to connect: ".mysqli_connect_error());
}

// echo "Connection successful.";
// not sure ?????
$sql = "INSERT INTO transactions (type, date, amount, noted)"
        VALUE ('$type', 'date', 'amount','note');

$stmt = mysqli_stmt_init($conn);



?>