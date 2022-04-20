<?php include_once('session_header.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Contact Us Page</title>

	<!--Bootstrap 5-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
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
			<li><a class="active" href="contact_page.php">Contact Us</a></li>
			<li><a href="login_page.php">Login</a></li>
			<li><a href="registration_page.php">Register</a></li>
		</ul>
	<?php } else if ($_SESSION['userType'] == 'admin') { ?>
		<ul id="navbar_div">
			<li><a href="home_page.php">Home</a></li>
			<li><a href="manage_account_page.php">Manage Account</a></li>
			<li><a href="administrator_page.php">Administrator Page</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a class="active" href="contact_page.php">Contact Us</a></li>
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
			<li><a class="active" href="contact_page.php">Contact Us</a></li>
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
			<li><a class="active" href="contact_page.php">Contact Us</a></li>
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
			<li><a class="active" href="contact_page.php">Contact Us</a></li>
			<li><a href="cart_page.php">Cart</a></li>
			
			<li><a href="order_history_page.php">Order History</a></li>
			<li><a href="logout_page.php">Logout</a></li>
		</ul>
	<?php }; ?>
	<div id='content_div'>
		<h2>Have a question or comment? Here’s how to reach us:</h2>
		<p>Business Hours: 7 am to 5 pm EST</p>
		<p>Phone: 111-222-3333</p>
		<p>Email: bookforeveryone@email.com</p>
	</div>
	<footer id='footer'>
		<p>&copy; TheBookStore</p>
	</footer>
</body>




</html>