<?php include_once('session_header.php');

if ($_SESSION['loginst'] == 0) {
    header("Location: login_page.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>

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

        #searchbar {
            margin: 50px 50px 50px;
        }
    </style>
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
            <li><a href="registration_page.php">Register</a></li>
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
            <li><a class="active" href="checkout_page.php">Checkout</a></li>
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
            <li><a class="active" href="checkout_page.php">Checkout</a></li>
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
            <li><a class="active" href="checkout_page.php">Checkout</a></li>
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
            <li><a class="active" href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>


    <form method="post">
        <h2>Checkout</h2>
        <div>
            <label for="type">Type of Checkout: </label>
            <select class="category" name="category">
                <option value="atStore">Reservation in Store/Cash</option>
                <option value="online">Credit/Debit Card</option>
            </select><br>
        </div>
        <div class="stacked">
            <label for="CreditCard">Credit Card Number: </label>
            <input type="text" name="CreditCard" id="creditcard">
        </div>
        <div class="stacked">
            <label for="name">Name on card: </label>
            <input type="text" name="name" id="name">
        </div>
        <div class="twoCol">
            <div class="stacked">
                <label for="date">Expiration Date: </label>
                <input type="date" name="date" id="date">
            </div>
            <div class="stacked">
                <label for="ccv">CCV number: </label>
                <input type="text" name="ccv" id="ccv" maxlength="3" minlength="3">
            </div>
        </div>
        <div class="stacked">
            <label for="CreditCard">Address: </label>
            <input type="text" name="address" id="credit card">
        </div>
        <div class="twoCol">
            <div class="stacked">
                <label for="state">State: </label>
                <input type="text" name="state" id="state" maxlength="2" minlength="2">
            </div>
            <div class="stacked">
                <label for="zipcode">Zipcode: </label>
                <input type="text" name="zipcode" id="zipcode" maxlength="5" minlength="5"><br><br>
            </div>
        </div>
        <button type="submit" name="btn" id="btn">Order</button>
    </form>



    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>