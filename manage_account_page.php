<?php include_once('session_header.php');

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

$query = "SELECT * FROM users WHERE userID=$_SESSION[userID]";
$items = $conn->query($query);
$item = $items->fetch_assoc();

$conn->close();
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
        .form-box {
            margin: auto;
            display:block;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 50%;
            left:25%;
        }
        input[type=text], input[type=number]{
            width: 100%;
            padding: 12px, 20px;
            margin: 8px, 0;
            float:inline-end;
        }
        input[type=submit] {
            float:right;
            margin-left: 8px;
        }
        input[type=checkbox] {
            margin-top: 16px;
            margin-right: 8px;
        }
        .col75 {
            float:left;
            width: 75%;
            margin-top: 6px;
        }
        .col25 {
            float:left;
            width: 25%;
            margin-top: 6px;
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



    <br>
    <div class="form-box">
        <h1>Manage Account</h1>
    <form action="account_action.php" method="post">
        <div class="col25">
            <label for="email">Email</label>
        </div>
        <div class="col75">
            <input type="text" name="email" value="skgh" readonly>
        </div>
        <div class="col25">
            <label for="firstname">First Name</label>    
        </div>
        <div class="col75">
            <input type="text" name="firstname" required>
        </div>
        <div class="col25">
            <label for="lastname">Last Name</label>    
        </div>
        <div class="col75">
            <input type="text" name="lastname" required>    
        </div>
        <div class="col25">
            <label for="phonenum">Phone Number</label>    
        </div>
        <div class="col75">
            <input type="text" name="phonenum" required>    
        </div>

        <label for="subscribe">
        <input type="checkbox">Subscribe for Promotions</label>  
        <hr>
        <input class="registrationSubmit" type="submit" id="createAccount" value="Update Account">
        <input class="registrationSubmit" type="submit" id="deleteAccount" formaction="delete_account.php" value="DELETE ACCOUNT">
    </form>
    <br>
    </div>

    <script>
            document.getElementsByName("email")[0].value="<?php echo $item['email'];?>";
            document.getElementsByName("firstname")[0].value="<?php echo $item['firstName'];?>";
            document.getElementsByName("lastname")[0].value="<?php echo $item['lastName'];?>";
            document.getElementsByName("phonenum")[0].value=<?php echo $item['phoneNumber'];?>;
    </script>


    

    <!-- <div class="form-box">
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
    </div> -->

    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>




</html>