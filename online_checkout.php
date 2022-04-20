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

date_default_timezone_set("America/New_York");

if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zip'];

    $full_name = "$fname" . " " . "$lname";
    $full_addr = "$address" . ", " . "$city" . ", " . "$state" . " " . "$zipcode";
    $orderTotal = $_SESSION['grandTotal'];
    $userID = $_SESSION['userID'];
    $date = date('m/d/Y');


    $stmt = "INSERT INTO orders (paymentStatus, grandTotal, userID, name, address, orderType, orderDate) VALUES ('true', '$orderTotal', '$userID', '$full_name', '$full_addr', 'onlineCard', '$date');";
    mysqli_query($conn, $stmt);

    $latest = "SELECT orderID FROM orders GROUP BY orderID DESC LIMIT 1";
    $latestOrders = mysqli_query($conn, $latest);
    foreach($latestOrders as $latestOrder) {
        $latestOrderID = $latestOrder['orderID'];
    }

    $stmt2 = "SELECT orderID, uniqueID, cartQuantity, orderDate, total FROM orders JOIN cart ON cart.userID = orders.userID WHERE orderDate = '$date' AND orderID = $latestOrderID";
    $cartInformations = mysqli_query($conn, $stmt2);
    // $stmt3 = "DELETE FROM cartHistory WHERE orderDate = $date";
    // mysqli_query($conn, $stmt3);
    foreach($cartInformations as $cartInformation) {
        $cartOrderID = $cartInformation['orderID'];
        $cartProdID = $cartInformation['uniqueID'];
        $cartQuantity = $cartInformation['cartQuantity'];
        $cartTotal = $cartInformation['total'];
        $stmt4 = "INSERT INTO cartHistory (orderID, prodID, quantity, orderDate, total, userID) VALUES ('$cartOrderID', '$cartProdID', '$cartQuantity', '$date', '$cartTotal', '$userID')";
        mysqli_query($conn, $stmt4);
    }
} else {
    header("location: checkout_page.php");
}


$deleteAfter = "DELETE FROM cart";
mysqli_query($conn, $deleteAfter);
//   echo $userID;
echo 'Online Checkout Success!';
include('home_page.php');



//header("location: home_page.html");

$conn->close();
