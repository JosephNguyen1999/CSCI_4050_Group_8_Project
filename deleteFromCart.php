<?php 
	include_once('session_header.php'); 

    if ($_SESSION['loginst'] == 0) {
        header("Location: login_page.php");
    }

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

	if (isset($_POST["submit"])) {
	  $productID = $_POST["product_id"];
	  $deleteProduct = "DELETE FROM cart WHERE uniqueID = $productID";
      $insertQuantity = "UPDATE products p JOIN cart c ON c.uniqueID = p.prodID SET p.quantity = p.quantity + c.cartQuantity WHERE p.prodID = '$productID'";
      mysqli_query($conn, $insertQuantity);
	  mysqli_query($conn, $deleteProduct);



	  include('cart_page.php');

	} else {
	  echo 'ERROR';
	}

	// $stmt = $conn->prepare("INSERT into cart(?) VALUES (?)");
	// $stmt->bind_param("i", $productID);
	// $stmt->execute();
	// $stmt->close();

	$conn->close();
?>