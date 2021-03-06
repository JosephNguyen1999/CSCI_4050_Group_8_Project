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
        .form-box {
            margin: auto;
            display:block;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            width: 50%;
            left:25%;
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
        <input type="checkbox" name="subscribe" value="yes">Subscribe for Promotions</label>  
        <hr>

        <input class="registrationSubmit" type="submit" id="createAccount" value="Update Account" onclick="update()">
        <input class="registrationSubmit" type="button" id="deleteAccount" value="DELETE ACCOUNT" onclick="showWarning()">
    </form>
    <br>
    </div>

    <div id="overlay">
    <div class="form-popup" id="myForm">
        <form action="delete_account.php" method="post" class="form-container">
        <h1>Are you sure you want to delete your account?</h1>
        <i>Your account will be permanently deleted!</i><hr>
        <button type="submit">Yes</button>
        <button type="button" onclick="closeForm()">No</button>
        </form>
    </div>
    </div>

    <script>
        document.getElementsByName("email")[0].value="<?php echo $item['email'];?>";
        document.getElementsByName("firstname")[0].value="<?php echo $item['firstName'];?>";
        document.getElementsByName("lastname")[0].value="<?php echo $item['lastName'];?>";
        document.getElementsByName("phonenum")[0].value=<?php echo $item['phoneNumber'];?>;
        if(<?php echo $item['subscribeStatus'];?> === 0) {
                document.getElementsByName("subscribe")[0].checked=false;
            }
        else {
                document.getElementsByName("subscribe")[0].checked=true;
        }
        function update() {
            if(document.getElementsByName("subscribe")[0].checked === false) {
                document.getElementsByName("subscribe")[0].value='no';
            } else {
                document.getElementsByName("subscribe")[0].value='yes';
            }
        }

        function showWarning() {
            document.getElementById("myForm").style.display = "inline-block";
            document.getElementById("overlay").style.display = "block";
        }
        function closeForm() {
            document.getElementById("myForm").style.display = "";
            document.getElementById("overlay").style.display = "";
        }
    </script>



    <footer id='footer'>
        <p>&copy; TheBookStore</p>
    </footer>
</body>




</html>