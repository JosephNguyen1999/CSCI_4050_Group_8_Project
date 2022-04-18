<?php include_once('session_header.php');

if ($_SESSION['loginst'] == 0 && $_SESSION['userType'] != 'publisher') {
    header("Location: login_page.php");
}
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
            <li><a class="active" href="publishers_page.php">Publisher Page</a></li>
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




    <h2>Your Products' Catalog</h2>

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
        <thead>
            <tr>
                <th></th>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><img src="images/0136061257.jpg" height="150px"></td>
                <td><a href="book_detail_page.php">Object-Oriented Software Engineering Using UML, Patterns, and Java, 3rd Edition</a></td>
                <td>Bernd Bruegge, Allen H. Dutoit</td>
                <td>$116.25</td>
                <td>
                    <form action="edit_product.php" method="post">
                        <button type="submit" class='edit' name="editProduct">Edit</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>




    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>