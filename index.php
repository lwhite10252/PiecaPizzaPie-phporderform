<?php
	require("navigationMenu.php");
	require_once("common.php");
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$_SESSION['username'] = $_POST['username'];
		
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
			//username is stored in session to use later
			//also start a new orderID for them in tblorders
			$date = date('m.d.y h:i:s');
			$conn->query("INSERT INTO tblorders (email, date) VALUES ('".$_SESSION['username']."', 
			'".$date."')");
			
			header ("location: orderPizza.php");
		} else {	
			//if no e-mail is entered, make 'em enter one!
			echo "**Please sign in or create an account";
		}
	} //end server post method check
?>

<html>
<head>
<title>Pieca Pizza Pie</title>
<link rel="stylesheet" href="css/mainStyle.css">
<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Roboto+Slab" rel="stylesheet">
</head>

<body>
	<div id="header">
		<img src="imgs/logo2.png" alt="Pieca Pizza Pie logo"/>
	</div>
	
	<div id="signin">
	<!-- welcome user to the site & explain app -->
	<p align="justify">Located in London, Ontario, <strong>Pieca Pizza Pie</strong> has served the downtown area and beyond for four years. We offer delivery and takeout, so give us a call and let us know what pizza masterpiece we can make for you!</p>
	<p>We pride ourselves on prompt, friendly and courteous service. Thank you for making us a part of your community.</p>
	
	<!-- let user sign in -->
	<form method="POST">
		<p>Please sign in or create an account with your e-mail below:</p>
		<br/>
		<p><input type="text" name="username" placeholder="E-mail / Username" 
		style="width: 250px" class="textbox" maxlength="50" 
		value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];} ?>"/>
		
		<input type="submit" name="begin" class="buttons" value="Start your Order"/></p>
	</form>
	</div>
	
	<div id="footer">
		<img src="imgs/pizzafooter.png"/>
	</div>
</body>
</html>