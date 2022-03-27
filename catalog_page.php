<?php
include_once('session_header.php');

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

$query = "SELECT * FROM products WHERE category='Book'";
$items = $conn->query($query);

$_SESSION['pageID'] = 1;

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
    </style>
</head>

<body>
    <div id="header">
        <img src="./images/headpugnobg.jpg" alt="pugbook" width="250" height="140">
        <h1>Book Store</h1>
    </div>



    <?php if ($_SESSION['loginst'] == 0) { ?>
        <ul id="navbar_div">
            <li><a href="home_page.php">Home</a></li>
            <li><a class="active" href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="login_page.php">Login</a></li>
            <li><a href="registration_page.php">Register</a></li>
        </ul>
    <?php } else { ?>
        <ul id="navbar_div">
            <li><a href="home_page.php">Home</a></li>
            <li><a class="active" href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.html">Cart</a></li>
            <li><a href="checkout_page.html">Checkout</a></li>
            <li><a href="order_history_page.html">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
            <li><a href="manage_account_page.html">Manage Account</a></li>
        </ul>
    <?php }; ?>




    <h2>Browse Catalog</h2>

    <div class="text-center">
        <form id="searchbar" action="action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Search</button>
            <select class="category" name="category">
                <option value="title">Title</option>
                <option value="subject">Subject</option>
                <option value="isbn">ISBN</option>
                <option value="author">Author</option>
            </select><br>
        </form>
    </div>





    <table class="table table-hover">
        <?php foreach ($items as $item) { ?>
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Cart</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="<?php echo $item['image'] ?>" height="150px"/></td>
                    <td><a href="book_detail_page.html"><?php echo $item['name'] ?></a></td>
                    <td><?php echo $item['author'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><a href="catalog_page.html">Add to cart</a></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>




    <footer id='footer'>
        <p>&copy; Book Store</p>
    </footer>
</body>

</html>