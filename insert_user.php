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
	
	//Bucket-List
	//Make sure username is unique. (Already does this but better error message could be shown
	//Make sure password is long enough
	//BONUS adjust phone
	
	//-Adjusted the Styles sheet for adding registration to login page (can be easily adjusted to look better)
	//-Added insert_login.php to add users
	//-Added 

	
	if (isset($_POST["createAccount"])) {
        $userType = $_POST["userType"] ?? '';
		$user = $_POST["username"] ?? '';
		$pass = $_POST["password"] ?? '';
		$phone = $_POST["phone"] ?? '';
		$first = $_POST["firstname"] ?? '';
        $last = $_POST["lastname"] ?? '';
		$email = $_POST["email"] ?? '';
        $phone = $_POST["phone"] ?? '';
        
	} else {
		include('registration_page.php');
	}

	/*
	if(strlen($pswd) < 5 ) 
	{
		echo "Password is less than 5 characters";
		include('login_page.php');
	}
	*/
	
	if(!empty($_POST["username"]) or !empty($_POST["password"]))
	{
		$sql = "INSERT INTO users (userType, firstName, lastName, username, password, email, phoneNumber, verificationCode, verificationStatus) 
        VALUES ('user', '$first', '$last', '$user', '$pass', '$email', '$phone', '1', 'true')";
		
		if(mysqli_query($conn, $sql)){
			echo "Account Successfully Created!";
			include('registration_page.php');
			}
			else
			{
				echo "ERROR: Duplicate username";
				include('registration_page.php');
			}
	}
	else
	{
		echo "Please fill in the required fields before signing up";
		include('registration_page.php');
	}

	$conn->close();
?>