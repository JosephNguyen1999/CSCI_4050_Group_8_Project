<?php include_once('session_header.php');

if ($_SESSION['loginst'] == 0 && ($_SESSION['userType'] != 'publisher' || $_SESSION['userType'] != 'admin')) {
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

$subquery = "";
$userID = $_SESSION['userID'];
$userType = $_SESSION['userType'];
if($userType == 'publisher') {
    $subquery = " WHERE publisher='$userID'";
}

$query = "SELECT * FROM `products`" . $subquery;

$items = $conn->query($query);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Publishers Page</title>

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
        .plus {
            --t:2px;   /* Thickness */
            --l:40px;  /* size of the symbol */
            --s:10px;  /* space around the symbol */
            --c1:#fff; /* Plus color*/
            --c2:#000; /* background color*/

            float: right;
            width:var(--l);
            height:var(--l);
            padding:var(--s);
            box-sizing:border-box; /*Remove this if you don't want space to be included in the size*/
            
            background:
                linear-gradient(var(--c1) 0 0) content-box,
                linear-gradient(var(--c1) 0 0) content-box,
                var(--c2);
            background-position:center;
            background-size: 100% var(--t),var(--t) 100%;
            background-repeat:no-repeat;
            }

        .radius {
            border-radius:50%;
         }
        .w80 {
            width: 80%;
            float: right;
        }
        .w20 {
            width: 19%;
            float:left;
            padding-right: 2px;
        }
        .form-box {
            margin: auto;
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            left:25%;
            margin-bottom: 200px;
        }
        input[type=text], input[type=number]{
            width: 100%;
            padding: 12px, 20px;
            margin: 8px, 0;
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
            <li><a class="active" href="publishers_page.php">Publisher Page</a></li>
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




    <h2>Your Products' Catalog</h2>

    <div class="text-center">
        <form id="searchbar" action="action_page.php">
            <input id="myInput" type="text" placeholder="Search.." name="search" onkeyup="myFunction()">
            <button type="submit">Search</button>
            <select id="filBy" class="category" name="category">
                <option value="title">Title</option>
                <option value="subject">Subject</option>
                <option value="isbn">ISBN</option>
                <option value="author">Author</option>
            </select><br>
        </form>
    </div>
    
    <div class="w20 form-box"> 
        <h1>Add new book</h1>
        <form action="add_book.php" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input name="title" type="text" required>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>
            <label for="isbn">ISBN:</label>
            <input type="number" name="isbn" required>
            <label for="description">Book description:</label>
            <input type="text" name="description" required>
            <label for="genre">Genre:</label>
            <input type="text" name="genre" required>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" required>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            <label for="image">Cover image:</label>
            <input type="file" name="fileToUpload" id="fileToUpload"><hr>
            <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['userID'];?>">
            <input class="plus radius" style="--l:35px;--t:3px;--c2:green;font-size:0;" type="submit" name="submit">
            
        </form>
        
    </div>
    

    <table id="myTable" class="table table-hover w80 form-box">
            <thead>
                <tr>
                <th>Title</th>
                <th>Subject</th>
                <th>ISBN</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Edit</th>
                </tr>
            </thead>
            <?php foreach ($items as $item) { ?>
                <tbody>
                    <tr>
                        <td> <p><?php echo $item['name']?></p> </td> 
                        <td> <p><?php echo $item['genre']?></p> </td> 
                        <td> <p><?php echo $item['ISBN']?></p> </td> 
                        <td> <p><?php echo $item['author']?></p> </td>
                        <td> <p><?php echo $item['quantity']?></p> </td> 
                        <td> <p><?php echo $item['price']?></p> </td> 

                        <td><button class="open-button" onclick="openForm(
                            '<?php echo $item['name']?>',
                            '<?php echo $item['genre']?>',
                            '<?php echo $item['ISBN']?>',
                            '<?php echo $item['author']?>',
                            '<?php echo $item['quantity']?>',
                            '<?php echo $item['price']?>',
                            '<?php echo $item['prodID']?>'
                            )">Edit</button>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
    </table>
    
    <div id="overlay">
        <div class="form-popup" id="myForm">
            <form action="pub_action.php" method="post" class="form-container"> <!--Change action-->
                <h1>Manage Books</h1>
                <label for="title">Title</label>
                <input type="text"  name="title" value="" required><br>
                <label for="genre">Genre</label>
                <input type="text"  name="genre" value="" required><br>
                <label for="isbn">ISBN</label>
                <input type="text"  name="isbn" value="" required><br>
                <label for="author">Author</label>
                <input type="text"  name="author" value="" required><br>
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" value="" required><br>
                <label for="price">Price</label>
                <input type="text" name="price" value="14" required><br>
                <i>Changes made to this form will modify this book.</i><br>
                <button type="submit">Modify</button>
                <input type="hidden" id="hid" name="proid" value="99">
                <button type="button" onclick="closeForm()">Close</button>
                <button type="submit" formaction="delete_book.php">DELETE BOOK</button>
            </form>
        </div>
    </div>

    <script>
        function openForm(title,genre,isbn,author,quantity,price,prodid) {
            document.getElementById("myForm").style.display = "inline-block";
            document.getElementById("overlay").style.display = "block";

            document.getElementsByName("title")[1].value = title;
            document.getElementsByName("genre")[1].value = genre;
            document.getElementsByName("isbn")[1].value = isbn;
            document.getElementsByName("author")[1].value = author;
            document.getElementsByName("quantity")[1].value = quantity;
            document.getElementsByName("price")[1].value = price;
            document.getElementsByName("proid")[0].value = prodid;
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
            a = 0; //default lastname
            if (strSelected === "Title") a = 0;
            if (strSelected === "Subject") a = 1;
            if (strSelected === "ISBN") a = 2;
            if (strSelected === "Author") a = 3;


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