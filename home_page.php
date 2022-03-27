<?php include_once('session_header.php'); ?>

<!DOCTYPE html>
<html>

<head>
	<title>Home Page</title>

	<!--Bootstrap 5-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
	<div id="header">
		<img src="./images/headpugnobg.jpg" alt="pugbook" width="250" height="140">
		<h1>Book Store</h1>
	</div>
	<?php if ($_SESSION['loginst'] == 0) { ?>
		<ul id="navbar_div">
			<li><a class="active" href="home_page.php">Home</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="login_page.php">Login</a></li>
			<li><a href="registration_page.php">Register</a></li>
		</ul>
	<?php } else { ?>
		<ul id="navbar_div">
			<li><a class="active" href="home_page.php">Home</a></li>
			<li><a href="catalog_page.php">Browse</a></li>
			<li><a href="about_page.php">About</a></li>
			<li><a href="contact_page.php">Contact Us</a></li>
			<li><a href="cart_page.html">Cart</a></li>
			<li><a href="checkout_page.html">Checkout</a></li>
			<li><a href="order_history_page.html">Order History</a></li>
			<li><a href="logout_page.php">Logout</a></li>
			<li><a href="manage_account_page.html">Manage Account</a></li>
		</ul>
	<?php }; ?>
	<div id='menu_div'>
		<form action="catalog_page.html" method="post">
			<h2>Explore our library!</h2>
			<p>We offer an assortment of different genres of books!</p>
			<button type="submit" class='menu_items_button' name="books">Browse</button>
		</form>
	</div>
	<footer id='footer'>
		<p>&copy; Book Store</p>
	</footer>
</body>




</html>