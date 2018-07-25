<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
ini_set('display_errors', 1);
error_reporting(-1);
// Enter username and password
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "ShoppingList";

// Create connection
$link = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
} 
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['item']);

// attempt insert query execution
$sql = "DELETE FROM list WHERE Item_Name = '$name'";
if(mysqli_query($link, $sql)){
    echo $sql;
    echo "Records deleted successfully.";
} else{
    echo "ERROR: Was not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>