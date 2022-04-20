<?php include_once('session_header.php');

/**if ($_SESSION['loginst'] == 0 && $_SESSION['userType'] != 'admin') {
*    header("Location: login_page.php");
*}**/
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

$query = "SELECT orders.orderID, orders.userID, orders.grandTotal, orders.quantity, orders.orderDate,
    users.email,
    products.name

    FROM orders
    INNER JOIN users ON orders.userID = users.userID
    INNER JOIN products ON orders.prodID = products.prodID;";

$items = $conn->query($query);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Catalog Page</title>

    <!--Bootstrap 5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/styles.css">

    <style>
        #searchbar {
            margin: 50px 50px 50px;
        }
        .form-popup {
            margin: auto;
            display:none;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 33%;
            position: fixed;
            bottom:25%;
            left:33%;
        }
        input[type=text], input[type=number],input[type=date]{
            width: 100%;
            padding: 12px, 20px;
            margin: 8px, 0;
            display: inline-block;
        }
        #overlay {
            position:fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display:none;
            background-color: rgba(0,0,0,0.5);
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
            <li><a class="active" href="administrator_page.php">Administrator Page</a></li>
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




    <h2>Orders Catalog</h2>

    <div class="text-center">
        <form id="searchbar" action="action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
            <select class="category" name="category">
                <option value="id">ID</option>
                <option value="email">Email</option>
            </select><br>
        </form>
    </div>




    <!--
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Address</th>
                <th>Products</th>
                <th>Grand Total</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>hello@uga.edu</td>
                <td>111 UGA Street</td>
                <td>Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition</td>
                <td>$116.25</td>
                <td><button type="button" class='edit' name="edit">Edit</button></td>
            </tr>
        </tbody>
    </table>
    -->
    
    <!--requires query to get from db-->
    <!--query needs orders and inner join on users and products-->
    <table class="table table-hover">
            <thead>
                <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Email</th>
                <th>Products</th>
                <th>Quantity</th>
                <th>Grand Total</th>
                <th>Order Date</th>
                <th>Edit</th>
                </tr>
            </thead>
            <?php foreach ($items as $item) { ?>
                <tbody>
                    <tr>
                        <td> <p><?php echo $item['orderID']?></p> </td> <!--from orders-->
                        <td> <p><?php echo $item['userID']?></p> </td> <!--from orders-->
                        <td> <p><?php echo $item['email']?></p> </td> <!--from users-->
                        <td> <p><?php echo $item['name']?></p> </td> <!--from products-->
                        <td> <p><?php echo $item['quantity']?></p> </td> <!--from orders-->
                        <td> <p><?php echo $item['grandTotal']?></p> </td> <!--from orders-->
                        <td> <p><?php echo $item['orderDate']?></p> </td> <!--from orders-->
                        
                        <td><button class="open-button" onclick="openForm(
                            '<?php echo $item['quantity']?>',
                            '<?php echo $item['grandTotal']?>',
                            '<?php echo $item['orderDate']?>',
                            '<?php echo $item['orderID']?>'
                            )">Edit</button>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
    </table>

    <!--Popup form for admin to edit order info-->
    <div id="overlay">
    <div class="form-popup" id="myForm">
        <form action="manage_order_action.php" method="post" class="form-container"> <!--need to create action page-->
        <h1>Manage Order</h1>

        <label for="quant">Quantity</label>
        <input type="number" name="quant" value="" required><br>

        <label for="total">Grand Total</label>
        <input type="number"  name="total" min="1" step="any" value="" required><br>

        <label for="date">Date</label>
        <input type="text"  name="date" value="" required><br>

        <i>Changes made to this form will modify order history.</i><br>

        <button type="submit">Modify</button>

        <input type="hidden" name="prodID">

        <button type="button" onclick="closeForm()">Close</button>
        </form>
    </div>
    </div>

    <!--Open and close scripts-->
    <script>
        function openForm(quantity, gtotal, odate, prodid) {
            document.getElementById("myForm").style.display = "inline-block";
            document.getElementById("overlay").style.display = "block";

            document.getElementsByName("quant")[0].value=quantity;
            document.getElementsByName("total")[0].value=gtotal;
            document.getElementsByName("date")[0].value=odate;
            document.getElementsByName("prodID")[0].value=prodid;

        }
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>






    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>