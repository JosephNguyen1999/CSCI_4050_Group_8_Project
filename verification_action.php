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

    if (isset($_POST["submit"])) {
        $user = $_POST["username"];
        $code = $_POST["code"];

        $userQuery = "SELECT * FROM users";
        $userInformations = mysqli_query($conn, $userQuery);
        $success = 0;
		foreach($userInformations as $userInformation){
            $username = $userInformation['username'];
            $userCode = $userInformation['verificationCode'];
            if ($user == $username && $code == $userCode) {
                $updateUsers = "UPDATE users SET verificationStatus = 'true' WHERE username = '$username' && verificationCode = '$userCode';";
                mysqli_query($conn, $updateUsers);

                $success = 1;
                echo 'Verification Success!';
                include('login_page.php');

            }
        }
        if ($success == 0) {
            echo 'Incorrect Username or Code!';
            include('verification_page.php');
        }
    } else {
        echo 'ERROR';
    }

    // $stmt = $conn->prepare("INSERT into cart(?) VALUES (?)");
    // $stmt->bind_param("i", $productID);
    // $stmt->execute();
    // $stmt->close();

    $conn->close();
