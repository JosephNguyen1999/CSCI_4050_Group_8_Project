<?php 
include_once('session_header.php'); 

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

?>

<html lang="en">



<head>

	<title>Registration Page</title>

	<!--Bootstrap 5-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">

	<style>
		form {
			display: table;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 100px;
		}

		form.p {
			display: table-row;
		}

		label {
			display: table-cell;
		}

		input {
			display: table-cell;
		}
	</style>

	<script src=
    	"https://smtpjs.com/v3/smtp.js">
  	</script>
  
  	<script type="text/javascript">
    	function sendEmail() {
      		//need to generate code
			//put the code in the database
			var val = document.getElementById("email").value;
			var code = (Math.random() + 1).toString(36).substring(7);
			document.cookie="code=" + code;
			<?php 
			$storeCode = $_COOKIE['code'];
			?>
			var test = "<html><h2>Well that was easy!!</h2><p>" + code + "</p><h2><a href='http://localhost/CSCI_4050_Group_8_Project/verification_page.php'>Visit W3Schools.com!</a></h2></html>";
			Email.send({
        	Host: "smtp.gmail.com",
        	Username: "thebookstore99@gmail.com",
        	Password: "thebookstore99",
        	To: val,
			// To: "josephnguyen902@gmail.com",
        	From: "thebookstore99@gmail.com",
        	Subject: "Sending Email using javascript",
        	Body: test,
			
      	})
        .then(function (message) {
          alert("mail sent successfully")
        });
    }
  	</script>

</head>



<body>
	<div id="header">

		<img src="./images/headpugnobg.jpg" alt="pugbook" width="250" height="140">

		<h1>TheBookStore</h1>
	</div>

	<?php if ($_SESSION['loginst'] == 0) { ?>
		<ul id="navbar_div">
			<li><a href="home_page.php">Home</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="login_page.php">Login</a></li>
			<li><a class="active" href="registration_page.php">Register</a></li>
		</ul>
	<?php } else if ($_SESSION['userType'] == 'admin') { ?>
		<ul id="navbar_div">
			<li><a href="home_page.php">Home</a></li>
			<li><a href="manage_account_page.php">Manage Account</a></li>
			<li><a href="administrator_page.php">Administrator Page</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="cart_page.php">Cart</a></li>
			
			<li><a href="order_history_page.php">Order History</a></li>
			<li><a href="logout_page.php">Logout</a></li>
		</ul>
	<?php } else if ($_SESSION['userType'] == 'user') { ?>
		<ul id="navbar_div">
			<li><a href="home_page.php">Home</a></li>
			<li><a href="manage_account_page.php">Manage Account</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="cart_page.php">Cart</a></li>
			
			<li><a href="order_history_page.php">Order History</a></li>
			<li><a href="logout_page.php">Logout</a></li>
		</ul>
	<?php } else if ($_SESSION['userType'] == 'publisher') { ?>
		<ul id="navbar_div">
			<li><a href="home_page.php">Home</a></li>
			<li><a href="manage_account_page.php">Manage Account</a></li>
			<li><a href="publishers_page.php">Publisher Page</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="cart_page.php">Cart</a></li>
			
			<li><a href="order_history_page.php">Order History</a></li>
			<li><a href="logout_page.php">Logout</a></li>
		</ul>
	<?php } else if ($_SESSION['userType'] == 'business') { ?>
		<ul id="navbar_div">
			<li><a href="home_page.php">Home</a></li>
			<li><a href="manage_account_page.php">Manage Account</a></li>
			<li><a href="business_owner_page.php">Business Owner Page</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="cart_page.php">Cart</a></li>
			
			<li><a href="order_history_page.php">Order History</a></li>
			<li><a href="logout_page.php">Logout</a></li>
		</ul>
	<?php }; ?>

	<div id="registrationPage">




		<form action="insert_user.php" method="post">

			<div>
				<h2 id="newAccountHeader">Create a new account today!</h2>
			</div>
			<div>
				<label for="firstname">First name: </label><input class="registration" type="text" name="firstname" id="firstname" required><br>
				<label for="lasttname">Last name: </label><input class="registration" type="text" name="lastname" id="lastname" required><br>
			</div>
			<div>
				<label for="email">Email Address: </label><input class="registration" type="email" name="email" id="email" required><br>
			</div>
			<div>
				<label for="date">Birth Date: </label>
				<input type="date" name="date" id="date">
			</div>
			<div>
				<label for="username">Username: </label><input class="registration" type="text" name="username" id="username" required><br>
			</div>
			<div>
				<label for="password">Password: </label><input class="registration" type="password" name="password" id="password" required><br>
				<label for="password2">Confirm Password: </label><input class="registration" type="password" name="password2" id="password2" required><br>
			</div>
			<div>
				<label for="country">Country: </label><select class="registration" name="country" id="country">
					<option value="select"><em>Select a Country</em></option>
					<option value="US">United States of America</option>
					<option value="Canada">Canada</option>
				</select><br>
			</div>
			<div>
				<label for="zipcode">Zipcode: </label><input class="registration" type="number" name="zipcode" id="zipcode"><br>
			</div>
			<div>
				<label for="city">City: </label><input class="registration" type="text" name="city" id="city" required><br>
				<label for="state">State: </label><input class="registration" type="text" name="state" id="state" required><br>
			</div>

			<div>
				<label for="address">Address: </label><input class="registration" type="text" name="address" id="address" required><br>
			</div>


			<div>
				<label for="phone">Phone Number: </label><input class="registration" type="number" name="phone"><br><br>
			</div>

			<div>
				<input type="hidden" name="storeCode" value="<?php echo $storeCode; ?>" />
				<input class="registrationSubmit" type="submit" name="createAccount" id="createAccount" value="Create Account" onclick="sendEmail()">
			</div>


		</form>

	</div>

</body>


<footer id='footer'>
	<p>&copy; TheBookStore</p>
</footer>





</html>