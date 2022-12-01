<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$connect= mysqli_connect("localhost", "root", "", "expense_tracker_pro");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$grocery_type = mysqli_real_escape_string($link, $_POST['grocery_type']);
$spending_date = mysqli_real_escape_string($link, $_POST['spending_date']);
$add_amount = mysqli_real_escape_string($link, $_POST['add_amount']);
$add_note = mysqli_real_escape_string($link, $_POST['add_note']);
$userid = 
 
// Attempt insert query execution
$sql = "INSERT INTO transactions (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>