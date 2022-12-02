<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connect= mysqli_connect("localhost", "root", "", "expense_tracker_pro");
 
// Check connection
if(mysqli_connect_errno()){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 


$grocery_type = intval($_POST['select_type']);
$spending_date = $_POST['spending_date'];
$add_amount = $_POST['add_amount'];
$add_note = $_POST['add_note'];
$userid = $_SESSION['id'];
 
// Attempt insert query execution
$sql = "INSERT INTO transactions (userId, date, amount, typeId, Notes) VALUES ('$userid', '$spending_date', '$add_amount', '$grocery_type', '$add_note')";
if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
    header('Location: insert.php');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
 
// Close connection
mysqli_close($connect);
?>