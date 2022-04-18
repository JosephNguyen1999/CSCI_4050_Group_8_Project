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

$query = "SELECT * FROM products";
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

    <script>
        function myFunction() {
            // Declare variables 
            var input, filter, table, tr, td, th, i, txtValue, selected, strSelected, a;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Filter by selected (Title or Author)
            selected = document.getElementById("filBy");
            strSelected = selected.options[selected.selectedIndex].text;
            a = 1;
            if (strSelected === "Title") a = 1;
            if (strSelected === "Author") a = 2;

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[a];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>



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
            <li><a class="active" href="catalog_page.php">Browse</a></li>
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
            <li><a class="active" href="catalog_page.php">Browse</a></li>
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
            <li><a class="active" href="catalog_page.php">Browse</a></li>
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
            <li><a class="active" href="catalog_page.php">Browse</a></li>
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
            <li><a class="active" href="catalog_page.php">Browse</a></li>
            <li><a href="about_page.php">About</a></li>
            <li><a href="contact_page.php">Contact Us</a></li>
            <li><a href="cart_page.php">Cart</a></li>
            <li><a href="checkout_page.php">Checkout</a></li>
            <li><a href="order_history_page.php">Order History</a></li>
            <li><a href="logout_page.php">Logout</a></li>
        </ul>
    <?php }; ?>




    <h2>Browse Catalog</h2>

    <div class="text-center">
        <form id="searchbar" action="action_page.php">
            <input type="text" id="myInput" onkeyup="myFunction() " placeholder="Search.." name="search">
            <button type="submit">Search</button>
            <select id="filBy" class="category" name="category">
                <option value="title">Title</option>
                <option value="subject">Subject</option>
                <option value="isbn">ISBN</option>
                <option value="author">Author</option>
            </select><br>
        </form>
    </div>




    <?php if ($_SESSION['loginst'] == 0) { ?>
        <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php foreach ($items as $item) { ?>
                <tbody>
                    <tr>
                        <td><img src="<?php echo $item['image'] ?>" height="150px" /></td>
                        <td><a href="book_detail_page.php"><?php echo $item['name'] ?></a></td>
                        <td><?php echo $item['author'] ?></td>
                        <td>
                            <p>$<?php echo $item['price'] ?></p>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    <?php } else { ?>
        <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Add to Cart</th>
                </tr>
            </thead>
            <?php foreach ($items as $item) { ?>
                <tbody>
                    <tr>
                        <td><img src="<?php echo $item['image'] ?>" height="150px" /></td>
                        <td><a href="book_detail_page.php"><?php echo $item['name'] ?></a></td>
                        <td><?php echo $item['author'] ?></td>
                        <td>
                            <p>$<?php echo $item['price'] ?></p>
                        </td>
                        <form action="addToCart.php" method="post">
                            <td>
                                <input type='number' name='quantity' min=1 max=<?php echo $item['quantity']; ?> value='1' />
                            </td>
                            <input type="hidden" name="productToAdd" value="<?php echo $item['prodID']; ?>" />
                            <input type="hidden" name="productPrice" value="<?php echo $item['price']; ?>" />
                            <td>
                                <input type="submit" name="submit" value="Add" />
                            </td>
                            <?php
                            $_SESSION['prodID'] = $item['prodID'];
                            ?>
                        </form>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    <?php }; ?>




    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>