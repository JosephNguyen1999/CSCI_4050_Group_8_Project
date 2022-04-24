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

$userID = $_SESSION['userID'];

$query = "SELECT * FROM cart JOIN products ON cart.uniqueID = products.prodID AND cart.userID = '$userID'";
$items = $conn->query($query);

$length = 12;
$storeCode = substr(str_shuffle('0123456789012345678901234567890123456789'), 1, $length);

$grandTotal = $_SESSION['grandTotal'];
date_default_timezone_set("America/New_York");
$date = date('m/d/Y');

$latest = "SELECT orderID FROM orders GROUP BY orderID DESC LIMIT 1";
$latestOrders = mysqli_query($conn, $latest);
$row_count = mysqli_num_rows($latestOrders);
if ($row_count > 0) {
    foreach ($latestOrders as $latestOrder) {
        $latestOrderID = $latestOrder['orderID'];
    }
    $stmt2 = "SELECT orderID FROM orders WHERE orderID = $latestOrderID";
    $cartInformations = mysqli_query($conn, $stmt2);
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
        /* form {
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
        } */

        .row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
        }

        .col-50 {
            -ms-flex: 50%;
            /* IE10 */
            flex: 50%;
        }

        .col-75 {
            -ms-flex: 75%;
            /* IE10 */
            flex: 75%;
        }

        .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text], input[type=email] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }

        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }

            .col-25 {
                margin-bottom: 20px;
            }
        }
    </style>

    <script src="https://smtpjs.com/v3/smtp.js">
    </script>

    <script type="text/javascript">
        function sendEmail() {
            // need to generate code
            // put the code in the database
            var val = document.getElementById("email").value;
            var code = document.getElementById("storeCode").value;
            var first = document.getElementById("fname").value;
            var last = document.getElementById("lname").value;
            var orderID = document.getElementById("orderID").value;
            var orderDate = document.getElementById("date").value;
            var PickupAddress = "111 UGA Way, Athens, GA 30605";
            var orderedItems = document.getElementById("item").value;
            var grandtotal = document.getElementById("grandTotal").value;
            var test = "<html><h2>Thank you for ordering with TheBookStore</h2>" + "<p>Name: " + first + " " + last +
                "</p><p>Confirmation Number: " + code +
                "</p><p>Order ID: " + orderID +
                "</p><p>Order Date: " + orderDate +
                "</p><p>Pickup Address: " + PickupAddress +
                "</p><p>Items Ordered: </p>" +
                "<table><thead><tr><th>Name</th></tr></thead><?php foreach ($items as $item) { ?><tbody><tr><td><?php echo $item['name'] ?></a></td></tr></tbody><?php } ?></table>" + 
                "<p>Grand Total: $" + grandtotal+ 
                "</p></html>";
            Email.send({
                    Host: "smtp.gmail.com",
                    Username: "TheBookStore999@gmail.com",
                    Password: "esuzhiwrpgablkmk",
                    To: val,
                    // To: "TheBookStore99@gmail.com",
                    From: "TheBookStore999@gmail.com",
                    Subject: "TheBookStore Order Reservation Confirmation!",
                    Body: test,

                })
                .then(function(message) {
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
            <li><a href="business_owner_page.php">Business Owner Page</a></li>
            <li><a href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>


    <div class="row">
        <div class="col-75">
            <div class="container">
                <form onsubmit="return sendEmail();" action="reservation_cash.php" method="post">

                    <div class="row">
                        <div class="col-50">
                            <h3>Order Information</h3>
                            <div class="row">
                                <div class="col-50">
                                    <label for="fname">First Name</label>
                                    <input type="text" id="fname" name="fname" placeholder="John" required>
                                </div>
                                <div class="col-50">
                                    <label for="lname">Last Name</label>
                                    <input type="text" id="lname" name="lname" placeholder="Doe" required>
                                </div>
                            </div>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" placeholder="john@example.com" required>

                        </div>

                        <div class="col-50">
                            <h3>Pickup Information</h3>
                            <label for="cname">Store Address: 111 UGA Way, Athens, GA 30605</label>
                            <label for="cname">Store Hours: 8 am to 5 pm EST</label>
                            <label for="cname">Books will be reserved for 5 days!</label>

                            <label for="cname">All forms of payment in store will be accepted!</label>
                        </div>

                    </div>
                    <?php foreach ($items as $item) { ?>
                        <input type="hidden" id="item" name="item" value="<?php echo $item['name']; ?>" />
                    <?php } ?>
                    <?php
                    if ($row_count <= 0) {
                    ?>

                        <input type="hidden" id="orderID" name="orderID" value="1" />
                        <?php } else {
                        foreach ($cartInformations as $cartInformation) {
                        ?>
                            <input type="hidden" id="orderID" name="orderID" value="<?php echo $cartInformation['orderID'] + 1; ?>" />
                    <?php }
                    } ?>
                    <input type="hidden" id="date" name="date" value="<?php echo $date; ?>" />
                    <input type="hidden" id="grandTotal" name="grandTotal" value="<?php echo $grandTotal; ?>" />
                    <input type="hidden" id="storeCode" name="storeCode" value="<?php echo $storeCode; ?>" />
                    <input type="submit" name="submit" value="Reserve In Store/Cash" class="btn">
                </form>
            </div>
        </div>

        <div class="col-25">
            <div class="container">
                <h4>Cart
                    <span class="price" style="color:black">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                </h4>
                <?php foreach ($items as $item) { ?>
                    <p><a href="#"><?php echo $item['name'] ?></a> <span class="price">$<?php echo $item['total'] ?></span></p>
                    <hr>
                <?php }
                ?>
                <p>Total <span class="price" style="color:black"><b>$<?php echo $grandTotal; ?></b></span></p>
            </div>
        </div>
    </div>



    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>