<?php include_once('session_header.php');
/**
 *if ($_SESSION['loginst'] == 0 && $_SESSION['userType'] != 'admin') {
 *    header("Location: login_page.php");
 *} */

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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Members Page</title>

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
            display: none;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 33%;
            position: fixed;
            bottom: 25%;
            left: 33%;
        }

        input[type=text] {
            width: 100%;
            padding: 12px, 20px;
            margin: 8px, 0;
            display: inline-block;
        }

        #overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: none;
            background-color: rgba(0, 0, 0, 0.5);
        }

        body{
            margin-bottom: 200px;
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




    <h2>Members Catalog</h2>

    <div class="text-center">
        <form id="searchbar" action="action_page.php">
            <input type="text" id="myInput" onkeyup="myFunction() " placeholder="Search.." name="search">
            <button type="submit">Search</button>
            <select id="filBy" class="category" name="category">
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
                    <td>
                        <p><?php echo $item['userID'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $item['firstName'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $item['lastName'] ?></p>
                    </td>
                    <td>
                        <p><?php echo $item['email'] ?></p>
                    </td>

                    <td><button class="open-button" onclick="openForm(
                            '<?php echo $item['firstName'] ?>',
                            '<?php echo $item['lastName'] ?>',
                            '<?php echo $item['email'] ?>',
                            '<?php echo $item['userID'] ?>'
                            )">Edit</button>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>

    <!--Popup form for admin to edit user info-->
    <div id="overlay">
        <div class="form-popup" id="myForm">
            <form action="manage_member_action.php" method="post" class="form-container">
                <h1>Manage User</h1>

                <label for="first">First Name</label>
                <input type="text" placeholder="Enter Password" name="first" value="" required><br>

                <label for="last">Last Name</label>
                <input type="text" placeholder="Enter Password" name="last" value="" required><br>

                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" value="" required><br>

                <i>Changes made to this form will modify this users account.</i><br>

                <button type="submit">Modify</button>

                <input type="hidden" name="uid">

                <button type="button" onclick="closeForm()">Close</button>
            </form>
        </div>
    </div>

    <!--Open and close scripts-->
    <script>
        function openForm(firstN, lastN, email, userid) {
            document.getElementById("myForm").style.display = "inline-block";
            document.getElementById("overlay").style.display = "block";

            document.getElementsByName("first")[0].value = firstN;
            document.getElementsByName("last")[0].value = lastN;
            document.getElementsByName("email")[0].value = email;
            document.getElementsByName("uid")[0].value = userid;

        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }


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
            a = 2; //default lastname
            if (strSelected === "Name") a = 2;
            if (strSelected === "ID") a = 0;
            if (strSelected === "Email") a = 3;


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

    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>

</html>