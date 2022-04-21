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

$titl=$_POST['title'];
$genr=$_POST["genre"];
$isbn=$_POST["isbn"];
$auth=$_POST["author"];
$quant=$_POST["quantity"];
$pric=$_POST["price"];
$prid=$_POST["proid"];
//echo $titl . " " . $genr . " " . $isbn . " " . $auth . " " . $quant . " " . $pric . " " . $prid; //debug

$query = "UPDATE `products` 
    SET `name`='$titl',
        `author`='$auth',
        `ISBN`=$isbn,
        `price`=$pric,
        `genre`='$genr',
        `quantity`=$quant
    WHERE `prodID`=$prid";

$conn->query($query);
$conn->close();

header("Location: publishers_page.php");
exit;
?>