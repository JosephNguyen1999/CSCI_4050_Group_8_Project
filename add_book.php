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

$msg="";

$filename = $_FILES["fileToUpload"]["name"];

$tempname = $_FILES["fileToUpload"]["tmp_name"];  

$folder = "images/".$filename;   

$query = "INSERT INTO `products`
        (`name`, `author`,
        `ISBN`, `description`, `price`,
        `genre`, `category`, `quantity`,
        `image`, `publisher`) 
    VALUES ('$titl','$auth',
        $isbn,'$desc',$pric,
        '$genr','Book',$quant,
        '$folder',$usid)";


if (move_uploaded_file($tempname, $folder)) {

    $msg = "Image uploaded successfully";

}else{

    $msg = "Failed to upload image";

}


echo $titl . " " . $auth . " " . $isbn . " " . $desc . " " . $genr . " " . $quant . " " . $pric . " " . $usid . " " . $img; //debug



$conn->query($query);
$conn->close();

header("Location: publishers_page.php");
exit;

?>