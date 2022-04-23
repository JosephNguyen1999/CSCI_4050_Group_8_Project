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
$auth=$_POST["author"];
$isbn=$_POST["isbn"];
$desc=$_POST["description"];
$genr=$_POST["genre"];
$pric=$_POST["price"];
$quant=$_POST["quantity"];
$usid=$_POST["userID"];

$query = "INSERT INTO `products`
        (`name`, `author`,
        `ISBN`, `description`, `price`,
        `genre`, `category`, `quantity`,
        `image`, `publisher`) 
    VALUES ('$titl','$auth',
        $isbn,'$desc',$pric,
        '$genr','Book',$quant,
        'images/headpug.jpg',$usid)";


echo $titl . " " . $auth . " " . $isbn . " " . $desc . " " . $genr . " " . $quant . " " . $pric . " " . $usid . " " . $img; //debug



$conn->query($query);
$conn->close();

header("Location: publishers_page.php");
exit;

?>