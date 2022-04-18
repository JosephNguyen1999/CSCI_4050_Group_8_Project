<?php include_once('session_header.php');

if ($_SESSION['loginst'] == 0 && $_SESSION['userType'] != 'admin') {
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

$query = "SELECT * FROM users";
$items = $conn->query($query);

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
            display:none;
            
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
            <li><a href="checkout_page.php">Checkout</a></li>
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
            <li><a href="checkout_page.php">Checkout</a></li>
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
            <li><a href="checkout_page.php">Checkout</a></li>
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
            <li><a href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>




    <h2>Members Catalog</h2>

    <div class="text-center">
        <form id="searchbar" action="action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
            <select class="category" name="category">
                <option value="name">Name</option>
                <option value="id">ID</option>
                <option value="email">Email</option>
            </select><br>
        </form>
    </div>


    <!--DISPLAY USERS DYNAMICALLY-->
    <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Edit</th>
                </tr>
            </thead>
            <?php foreach ($items as $item) { ?>
                <tbody>
                    <tr>
                        <td> <p><?php echo $item['userID']?></p> </td>
                        <td> <p><?php echo $item['firstName']?></p> </td>
                        <td> <p><?php echo $item['lastName']?></p> </td>
                        <td> <p><?php echo $item['email']?></p> </td>
                        
                        <td><button class="open-button" onclick="openForm(
                            '<?php echo $item['firstName']?>',
                            '<?php echo $item['lastName']?>',
                            '<?php echo $item['email']?>'
                            )">Edit</button>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
    </table>

    <!--Popup form for admin to edit user info-->
    <div class="form-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
        <h1>Manage</h1>

        <label for="first"><b>First Name</b></label>
        <input type="text" placeholder="Enter Password" name="first" value="" required>

        <label for="last"><b>Last Name</b></label>
        <input type="text" placeholder="Enter Password" name="last" value="" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" value="" required>

        <button type="submit" class="btn">modify</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>

    <!--Open and close scripts-->
    <script>
        function openForm(firstN, lastN, email) {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("myTable").style.display = "none";
            document.getElementById("searchbar").style.display = "none";

            document.getElementsByName("first")[0].value=firstN;
            document.getElementsByName("last")[0].value=lastN;
            document.getElementsByName("email")[0].value=email;

        }
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("myTable").style.display = "";
            document.getElementById("searchbar").style.display = "";
        }
    </script>

    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>