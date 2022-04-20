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

$gtotal = $_POST['total'];
$odate = $_POST['date'];
$oid = $_POST['oID'];
echo $gtotal . " " . $odate . " " . $oid;//debug


$query = "UPDATE `orders`
    SET `orderDate`='$odate',
        `grandTotal`=$gtotal
    WHERE `orderID`=$oid";

$conn->query($query);
$conn->close();

header("Location: manage_orders.php");
?>