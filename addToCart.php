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

    if (isset($_POST["submit"])) {
        $productID = $_POST["productToAdd"];
        $productPrice = $_POST['productPrice'];
        $quantity = $_POST['quantity'];

        $total = $productPrice * $quantity;
        $roundedTotal = round($total, 2);

        $userID = $_SESSION['userID'];

        $insertProduct = "INSERT INTO cart (userID, cartQuantity, uniqueID, total) VALUES ('$userID', '$quantity', '$productID', '$roundedTotal');";
        mysqli_query($conn, $insertProduct);

        $updateProduct = "UPDATE products SET quantity = quantity - '$quantity' WHERE prodID = '$productID';";
        mysqli_query($conn, $updateProduct);
        include('catalog_page.php');
    } else {
        echo 'ERROR';
    }

    // $stmt = $conn->prepare("INSERT into cart(?) VALUES (?)");
    // $stmt->bind_param("i", $productID);
    // $stmt->execute();
    // $stmt->close();

    $conn->close();
?>