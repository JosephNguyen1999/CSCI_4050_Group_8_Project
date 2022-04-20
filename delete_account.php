<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booksDatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$query = "DELETE FROM users WHERE userID=$_SESSION[userID]";
session_unset();
session_destroy();

$items = $conn->query($query);
$conn->close();
header("Location: home_page.php");
exit;
?>