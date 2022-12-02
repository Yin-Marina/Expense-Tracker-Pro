<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connect= mysqli_connect("localhost", "root", "", "expense_tracker_pro");
 
// Check connection
if(mysqli_connect_errno()){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 


$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
 
// Attempt insert query execution
$sql = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
if(mysqli_query($connect, $sql)){
    echo "Records added successfully.";
    header('Location: login.html');
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
 
// Close connection
mysqli_close($connect);
?>