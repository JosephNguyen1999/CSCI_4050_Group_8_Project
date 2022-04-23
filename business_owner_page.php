<?php include_once('session_header.php');

if ($_SESSION['loginst'] == 0 && $_SESSION['userType'] != 'business') {
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
date_default_timezone_set("America/New_York");
$date = date('m/d/Y');
$query2 = "SELECT orderID, orderDate, grandTotal FROM orders WHERE orderDate = '$date';";
$orders = $conn->query($query2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Business Owner Page</title>

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
            <li><a class="active" href="business_owner_page.php">Business Owner Page</a></li>
            <li><a href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>

            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>

    <h2>End of Day Sales</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order Total</th>
            </tr>
        </thead>
        <?php
        foreach ($orders as $order) {
            $orderID = $order['orderID'];
            $query = "SELECT name, cartHistory.quantity, total, orderDate FROM cartHistory JOIN products ON cartHistory.prodID = products.prodID WHERE orderID = '$orderID';";
            $items = $conn->query($query);
        ?>
            <tbody>
                <tr>
                    <td><?php echo $order['orderID']; ?></td>
                    <td>
                        <?php
                        echo $order['orderDate'];
                        ?>
                    </td>
                    <td><a href="book_detail_page.php">
                            <?php
                            foreach ($items as $item) {
                                echo $item['name'];
                                echo "<br>";
                            }
                            ?>
                        </a></td>
                    <td>
                        <?php
                        foreach ($items as $item) {
                            echo $item['quantity'];
                            echo "<br>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        foreach ($items as $item) {
                            echo "$";
                            echo $item['total'];
                            echo "<br>";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        echo "$";
                        echo $order['grandTotal'];
                        ?>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>


    <?php
    $grandTotal = 0;
    $roundedGrand = 0;
    foreach ($orders as $order) {
        $total = $order['grandTotal'];
        $grandTotal = $grandTotal + $total;
        $roundedGrand = round($grandTotal, 2);
    }
    ?>

    <div id="menu_div">
        <h3>End of Day Grand Total: $<?php echo $roundedGrand; ?></h3><br><br>
    </div>

    <div>
        <?php
        $query = "SELECT * FROM products WHERE quantity < 2;";
        $quantities = $conn->query($query);
        $row_count = mysqli_num_rows($quantities);
        ?>

        <h3>Low Inventory Status:</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity in Stock</th>
                </tr>
            </thead>
            <?php
            if ($row_count > 0) {
                foreach ($quantities as $quantity) {
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $quantity['name']; ?></td>
                            <td>
                                <?php
                                echo $quantity['quantity'];
                                ?>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            <?php
            } else {
            ?>
                <h4>No Products are currently low in inventory!</h4>
            <?php
            }
            ?>
    </div>

    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>