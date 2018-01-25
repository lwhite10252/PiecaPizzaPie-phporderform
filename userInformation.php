<?php
	require("navigationMenu.php");
	require_once("common.php");
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
			$username = $_SESSION['username'];
			$_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['lastname'] = $_POST['lastname'];
			$_SESSION['address'] = $_POST['address'];
			$_SESSION['city'] = $_POST['city'];
			$_SESSION['province'] = $_POST['province'];
			$_SESSION['postalcode'] = $_POST['postalcode'];
			$_SESSION['phone'] = $_POST['phone'];
		
			$isUser = $conn->query("SELECT * FROM tblcustomers WHERE email = '".$username."' LIMIT 1");
			
			if (isset($username) && $isUser->num_rows == 1) {
				//user already exists, so don't make another user entry
				header ("location: orderSummary.php");
			}
		
			//the SQL queries only run if all fields have been filled out
			if (!empty($_SESSION['firstname']) && !empty($_SESSION['lastname']) 
				&& !empty($_SESSION['address']) && !empty($_SESSION['city']) 
				&& !empty($_SESSION['province']) && !empty($_SESSION['postalcode']) 
				&& !empty($_SESSION['phone'])) {
			
				//insert user info into database
				$conn->query("INSERT INTO tblcustomers (email, firstname, lastname, address,
					city, province, postalcode, phone) VALUES ('".$username."', 
					'".$_SESSION['firstname']."', '".$_SESSION['lastname']."', 
					'".$_SESSION['address']."', '".$_SESSION['city']."', '".$_SESSION['province']."', 
					'".$_SESSION['postalcode']."', '".$_SESSION['phone']."')");
				
				header ("location: orderSummary.php");
			} else if (!is_numeric($_SESSION['phone'])) {
				//on submit of form, make sure phone number is only numbers
				echo "**Phone number must be digits 0-9<br/>";
			} else {
				//if any fields are missing, print an error message
				echo "**Please fill in empty fields<br/>";
			}
		}
	} //end server post method check
?>

<html>
<head>
<title>Pieca Pizza Pie</title>
<link rel="stylesheet" href="css/secondaryStyle.css">
<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Roboto+Slab" rel="stylesheet">
</head>

<body>
	<div id="header">
		<img src="imgs/logo2.png" alt="Pieca Pizza Pie logo"/>
	</div>
	
	<div id="main">
	
	<!-- user information -->
	<h2 style="margin-left:50px;">Account Information</h2>	
	<form method="POST">		
		
		<div id="userinfo">
		<p><?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; } else { echo "Not signed in"; } ?></p>
		
		<p><input type="text" name="firstname" class="textbox"
			value="<?php if(isset($_SESSION['firstname'])) { echo $_SESSION['firstname'];
			} ?>"/>
			<strong>&nbsp;&nbsp;First Name</strong></p>
		
		<p><input type="text" name="lastname" class="textbox"
			value="<?php if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } ?>"/>
			<strong>&nbsp;&nbsp;Last Name</strong></p>
		
		<p><input type="text" name="address" class="textbox"
			value="<?php if(isset($_SESSION['address'])) { echo $_SESSION['address']; } ?>"/>
			<strong>&nbsp;&nbsp;Address</strong></p>
		
		<p><input type="text" name="city" class="textbox"
			value="<?php if(isset($_SESSION['city'])) { echo $_SESSION['city']; } ?>"/>
			<strong>&nbsp;&nbsp;City</strong></p>
	
		<p><input type="text" name="province" class="textbox"
			value="<?php if(isset($_SESSION['province'])) { echo $_SESSION['province']; } ?>"/>
			<strong>&nbsp;&nbsp;Province</strong></p>
		
		<p><input type="text" name="postalcode" maxlength="6" class="textbox"
			value="<?php if(isset($_SESSION['postalcode'])) { echo $_SESSION['postalcode']; } ?>"/>
			<strong>&nbsp;&nbsp;Postal Code</strong></p> 
		
		<p><input type="text" name="phone" maxlength="10" class="textbox"
			value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone']; } ?>"/>
			<strong>&nbsp;&nbsp;Phone Number</strong></p>
	
		<p><input type="submit" class="buttons" value="Submit"/></p>
		</div>
		
	</form>
	</div>
	
	<div id="footer">
		<img src="imgs/pizzafooter.png"/>
	</div>
</body>
</html>