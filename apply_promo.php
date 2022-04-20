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
        $userPromo = $_POST["promoCode"];

        $promoQuery = "SELECT * FROM promoCodes";
        $promoInformations = mysqli_query($conn, $promoQuery);
		foreach($promoInformations as $promoInformation){
            $promoCode = $promoInformation['promoCode'];
            if ($userPromo == $promoCode) {
                $promoNumber = $promoInformation['promoNumber'];
                $promoDiscount = 1 - $promoNumber;
                if ($promoNumber < 1) {
                    $updateCart = "UPDATE cart SET total = total * '$promoDiscount';";
                    mysqli_query($conn, $updateCart);
                    $getTotal = "SELECT uniqueID, total FROM cart;";
                    $totals = mysqli_query($conn, $getTotal);
                    foreach ($totals as $total) {
                        $roundTotal = $total['total'];
                        $roundTotal = round($roundTotal, 2);
                        $uniqueID = $total['uniqueID'];
                        $updatedCart = "UPDATE cart SET total = '$roundTotal' WHERE uniqueID = $uniqueID;";
                        mysqli_query($conn, $updatedCart);
                    }
                }
                else {
                    $updateCart = "UPDATE cart SET total = total - '$promoNumber';";
                    mysqli_query($conn, $updateCart);
                    $getTotal = "SELECT uniqueID, total FROM cart;";
                    $totals = mysqli_query($conn, $getTotal);
                    foreach ($totals as $total) {
                        $roundTotal = $total['total'];
                        $roundTotal = round($roundTotal, 2);
                        $uniqueID = $total['uniqueID'];
                        $updatedCart = "UPDATE cart SET total = '$roundTotal' WHERE uniqueID = $uniqueID;";
                        mysqli_query($conn, $updatedCart);
                    }
                }

            }
    
        }

        echo 'Applied Promotion!';
        include('cart_page.php');
    } else {
        echo 'ERROR';
    }

    // $stmt = $conn->prepare("INSERT into cart(?) VALUES (?)");
    // $stmt->bind_param("i", $productID);
    // $stmt->execute();
    // $stmt->close();

    $conn->close();
?>