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

	<style>
		form {
			display: table;
			margin-left: auto;
			margin-right: auto;
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

</head>

<body>

	<div id="header">
		<img src="./images/headpugnobg.jpg" alt="pugbook" width="250" height="140">
		<h1>Book Store</h1>
	</div>
	<?php if ($_SESSION['loginst'] == 0) { ?>
		<ul id="navbar_div">
			<li><a href="home_page.html">Home</a></li>
			<li><a href="catalog_page.html">Browse</a></li>
			<li><a href="about_page.html">About</a></li>
			<li><a href="contact_page.html">Contact Us</a></li>
			<li><a href="cart_page.html">Cart</a></li>
			<li><a href="checkout_page.html">Checkout</a></li>
			<li><a href="order_history_page.html">Order History</a></li>
			<li><a class="active" href="login_page.html">Login</a></li>
			<li><a href="registration_page.html">Register</a></li>
			<li><a href="logout_page.html">Logout</a></li>
			<li><a href="verification_page.html">Verify</a></li>
			<li><a href="manage_account_page.html">Manage Account</a></li>
		</ul>
	<?php } else { ?>
	<?php }; ?>
	<div id="loginPage">

		<form action="validate_login.php" method="post">


			<h2 id="newAccountHeader">Log In</h2>
			<div>
				<label for="email">E-mail: </label>
				<input class="registration" type="email" name="email" required><br>
			</div>
			<div>
				<label for="password">Password: </label>
				<input class="registration" type="password" name="password" required><br><br>
			</div>
			<input class="registrationSubmit" type="submit" id="createAccount" value="Login">

		</form>
	</div>





</body>


<footer id='footer'>
	<p>&copy; Book Store</p>
</footer>


</html>