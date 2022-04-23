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

$userID = $_SESSION['userID'];

$query = "SELECT * FROM cart JOIN products ON cart.uniqueID = products.prodID AND cart.userID = '$userID'";
$items = $conn->query($query);
// if (isset($_SESSION['userID'])) {
//     $userID = 1;

//     $findType = "SELECT userType FROM users WHERE userID = $userID";
//     $types = $conn->query($query);
//     foreach ($types as $type) {
//         echo $type['userType'];
//     }
// } else {
//     echo 2;
// }

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

        #cartTitle {
            text-align: center;
        }

        h2,
        h4 {
            text-align: center;
        }

        body {
            margin-bottom: 300px;
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
            <li><a class="active" href="cart_page.php">Cart</a></li>

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
            <li><a class="active" href="cart_page.php">Cart</a></li>

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
            <li><a class="active" href="cart_page.php">Cart</a></li>

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
            <li><a class="active" href="cart_page.php">Cart</a></li>

            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>

    <div id='cartTitle'>
        <h2>Cart</h2>
    </div>

    <table id="myTable" class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Delete From Cart</th>
            </tr>
        </thead>
        <?php foreach ($items as $item) {
            if ($userID == $item['userID']) { ?>
                <tbody>
                    <tr>
                        <td><img src="<?php echo $item['image'] ?>" height="150px" /></td>
                        <td><a href="book_detail_page.php"><?php echo $item['name'] ?></a></td>
                        <td><?php echo $item['author'] ?></td>
                        <td>
                            <p>$<?php echo $item['price'] ?></p>
                        </td>
                        <td><?php echo $item['cartQuantity'] ?></td>
                        <td><?php echo round($item['total'], 2) ?></td>
                        <form action="deleteFromCart.php" method="post">
                            <td>
                                <input type="hidden" name="product_id" value="<?php echo $item['prodID']; ?>" />
                                <input type="submit" name="submit" value="Delete" />
                            </td>
                        </form>
                    </tr>
                </tbody>
        <?php }
        } ?>
    </table>

    <?php
    $grandTotal = 0;
    $roundedGrand = 0;
    foreach ($items as $item) {
        if ($userID == $item['userID']) {
            $total = $item['total'];
            $grandTotal = $grandTotal + $total;
            $roundedGrand = round($grandTotal, 2);
        }
    }
    ?>

    <h2><br>Grand Total: $<?php echo $roundedGrand; ?><br><br></h2>

    <?php $_SESSION['grandTotal'] = $roundedGrand; ?>


    <div id="menu_div">
        <h3>Enter Promotion Code Below:</h3>
    </div>
    <div>
        <form action="apply_promo.php" method="post">
            <input class="verify" type="text" name="promoCode">
            <button type="submit" class='promoApply' name="submit">Apply</button>
            <br><br><br><br>
        </form>
    </div>
    <form action="checkout_page.php" method="post">
        <div>
            <button type="submit" class='proceedCheckout' name="proceedCheckout">Proceed to Online Checkout!</button>
        </div>
    </form>
    <h4>OR</h4>
    <form action="reservation_page.php" method="post">
        <div>
            <button type="submit" class='proceedCheckout' name="proceedCheckout">Reserve Book(s)/Cash!</button>
        </div>
    </form>

    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>