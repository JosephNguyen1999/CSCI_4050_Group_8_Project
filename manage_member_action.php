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

$fname = $_POST['first'];
$lname = $_POST['last'];
$email = $_POST['email'];
$uid = $_POST['uid'];
//echo $fname . " " . $lname . " " . $email . " " . $uid; //debug


$query = "UPDATE `users`
    SET `firstName`='$fname',
        `lastName`='$lname',
        `email`='$email' 
    WHERE `userID`=$uid";

$conn->query($query);
$conn->close();



header("Location: manage_members.php");
?>