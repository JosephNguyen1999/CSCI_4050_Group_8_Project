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
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phnum = $_POST['phonenum'];
$sub = 0;
if($_POST['subscribe'] == 'yes') $sub = 1;
$uid = $_SESSION['userID'];
//echo $fname . " " . $lname . " " . $phnum . " " . $uid;

$query = "UPDATE `users`
    SET `firstName`='$fname',
    `lastName`='$lname',
    `phoneNumber`=$phnum,
    `subscribeStatus`=$sub
    WHERE `userID`=$uid";
$conn->query($query);

$conn->close();

header("Location: manage_account_page.php");
exit;
?>