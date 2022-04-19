<?php
	session_start();

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

	$_SESSION['loginst'] = 0;
	$_SESSION['userID'] = 0;

	if (isset($_POST["submit"])) {
		$uname = $_POST["uname"] ?? '';
		$password = $_POST["password"] ?? '';
		$check = $_POST["check"] ?? '';
	} else {
		include('login_page.php');
	}

	$query = "SELECT * FROM users WHERE username='$uname' AND password='$password'";
	$data = $conn->query($query);

//  This query breaks validate login. Should cart.quantity be cart.cartQuantity?	
//	$query3 = "SELECT products.name, cart.quantity, cart.productID, products.price FROM cart JOIN products ON cart.productID = products.productID";
//	$cartItems = $conn->query($query3);

	$query2 = "SELECT userID, userType FROM users WHERE username='$uname' AND password='$password'";
	mysqli_query($conn, $query2);


	$row_count = mysqli_num_rows($data);
	if($row_count > 0) {
		if($check=='1') {
			setcookie("mycookie", TRUE, time()+6);
		}
		$_SESSION['loginst'] = 1;
		foreach($data as $datas){
			$_SESSION['userID'] = $datas['userID'];
			$_SESSION['userType'] = $datas['userType'];
		}
		include('home_page.php');
		echo $_SESSION['loginst'];
	} else {
		include('error.php');
		$conn->close();
	}
?>