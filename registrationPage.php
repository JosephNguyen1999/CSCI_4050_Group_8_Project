

<html lang="en">



<head>

        <!--Bootstrap 5-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
	
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    
	<div id="header">
        
		<img src="./images/headpugnobg.jpg" alt="pugbook" width="250" height="140">
        
        <h1>Book Store</h1>
	</div>
    

	<div id="registrationPage">
	
	
	

	<form action="addUserAction.php" method="post">
	
	
		<h2 id="newAccountHeader">NEW ACCOUNT</h2>

		<label for="firstname">First name: </label><input class="registration" type="text" name="firstname" required><br>
		<label for="lasttname">Last name: </label><input class="registration" type="text" name="lastname" required><br>
			
		<label for="email">E-mail: </label><input class="registration" type="email" name="email" required><br>
		
		
		<label for="password">Password: </label><input class="registration" type="password" name="password" required><br>
		<label for="password2">Confirm Password: </label><input class="registration" type="password" name="password2" required><br>
		
		<label for="country">Country: </label><select class="registration" name="country">
					<option value="select"><em>Select a Country</em></option>
					<option value="US">United States of America</option>
					<option value="Canada">Canada</option>
				</select><br>
		
		<label for="zipcode">Zipcode: </label><input class="registration" type="number" name="zipcode"><br>

		<label for="city">City: </label><input class="registration" type="text" name="city" required><br>
		<label for="state">State: </label><input class="registration" type="text" name="state" required><br>
		
		<label for="address">Address: </label><input class="registration" type="text" name="address" required><br>
		
			<label for="phone">Phone Number: </label><input class="registration" type="number" name="phone"><br>
		
		
		<input class="registrationSubmit" type="submit" id="createAccount" value="Create Account">
		 
	</form>
         
	</div>
     <br><br><br><br>

</body>
    <br><br><br><br>
    
    
    <footer id='footer'>
		<p>&copy; Book Store</p>
	</footer>
    
      
   


</html>