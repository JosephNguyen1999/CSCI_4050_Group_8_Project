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

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phnum = $_POST['phonenum'];
$uid = 1;
echo $fname . " " . $lname . " " . $phnum . " " . $uid;

$query = "UPDATE `users`
    SET `firstName`='$fname',
    `lastName`='$lname',
    `phoneNumber`=$phnum
    WHERE `userID`=$uid";
$conn->query($query);

$conn->close();

header("Location: manage_account_page.php");
exit;
?>