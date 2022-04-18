<?php include_once('session_header.php');

if ($_SESSION['loginst'] == 0) {
    header("Location: login_page.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Manage Account</title>

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
            <li><a class="active" href="manage_account_page.php">Manage Account</a></li>
            <li><a href="administrator_page.php">Administrator Page</a></li>
            <li><a href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>
            <li><a href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php } else if ($_SESSION['userType'] == 'user') { ?>
        <ul id="navbar_div">
            <li><a href="home_page.php">Home</a></li>
            <li><a class="active" href="manage_account_page.php">Manage Account</a></li>
            <li><a href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>
            <li><a href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php } else if ($_SESSION['userType'] == 'publisher') { ?>
        <ul id="navbar_div">
            <li><a href="home_page.php">Home</a></li>
            <li><a class="active" href="manage_account_page.php">Manage Account</a></li>
            <li><a href="publishers_page.php">Publisher Page</a></li>
            <li><a href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>
            <li><a href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php } else if ($_SESSION['userType'] == 'business') { ?>
        <ul id="navbar_div">
            <li><a href="home_page.php">Home</a></li>
            <li><a class="active" href="manage_account_page.php">Manage Account</a></li>
            <li><a href="business_owner_page.php">Business Owner Page</a></li>
            <li><a href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>
            <li><a href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>

    <form action="addUserAction.php" method="post">
        <div>
            <h2 id="newAccountHeader">EDIT ACCOUNT</h2>
        </div>
        <div>
            <label for="firstname">First name: </label><input class="registration" type="text" name="firstname" required><br>
            <label for="lasttname">Last name: </label><input class="registration" type="text" name="lastname" required><br>
        </div>
        <div>
            <label for="email">Email Address: </label><input class="registration" type="email" name="email" required><br>
        </div>
        <div>
            <label for="date">Birth Date: </label>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="password">Password: </label><input class="registration" type="password" name="password" required><br>
            <label for="password2">Confirm Password: </label><input class="registration" type="password" name="password2" required><br>
        </div>
        <div>
            <label for="country">Country: </label><select class="registration" name="country">
                <option value="select"><em>Select a Country</em></option>
                <option value="US">United States of America</option>
                <option value="Canada">Canada</option>
            </select><br>
        </div>
        <div>
            <label for="zipcode">Zipcode: </label><input class="registration" type="number" name="zipcode"><br>
        </div>
        <div>
            <label for="city">City: </label><input class="registration" type="text" name="city" required><br>
            <label for="state">State: </label><input class="registration" type="text" name="state" required><br>
        </div>

        <div>
            <label for="address">Address: </label><input class="registration" type="text" name="address" required><br>
        </div>


        <div>
            <label for="phone">Phone Number: </label><input class="registration" type="number" name="phone"><br><br>
        </div>

        <div>
            <label class="container">Subscribe For Promotions and Latest News
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label><br>
        </div>

        <div>
            <input class="registrationSubmit" type="submit" id="createAccount" value="Update Account">
            <hr>
        </div>

        <div>
            <input class="registrationSubmit" type="submit" id="deleteAccount" value="DELETE ACCOUNT">
        </div>
    </form>

    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>




</html>