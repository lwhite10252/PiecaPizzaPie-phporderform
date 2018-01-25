<?php
	require("navigationMenu.php");
	require_once("common.php");
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
			$size = $_POST['size'];
			$dough = $_POST['dough'];
			$sauce = $_POST['sauce'];
			$cheese = $_POST['cheese'];
			$toppings = implode(', ', $_POST['toppings']);
		
			if (isset($size) && isset($dough) && isset($sauce) && isset($cheese) && isset($toppings)) {
				$_SESSION['orderid'] = $conn->insert_id;
				$conn->query("INSERT INTO tblpizza (orderID, size, dough, sauce, cheese, toppings) 
				VALUES ('".$_SESSION['orderid']."', '".$size."', '".$dough."', '".$sauce."', '".$cheese."', '".$toppings."');");	
			
				header ("location: userInformation.php");
			} else {
				echo "Please customize your pizza completely.";
			}
		} else {	
			//if no e-mail has been entered, they can't proceed
			echo "**Please sign in or create an account";
		}	
	} // end server post method check */
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
	
	<form method="POST">
	<div id="toppingdiv1">
	<h2>Size</h2>
	<p>
		<input type="radio" name="size" value="Small">&nbsp;&nbsp;Small</input><br/>
		<input type="radio" name="size" value="Medium">&nbsp;&nbsp;Medium</input><br/>
		<input type="radio" name="size" value="Large">&nbsp;&nbsp;Large</input><br/>
		<input type="radio" name="size" value="Extra Large">&nbsp;&nbsp;Extra Large</input><br/>
	</p><br/>
	
	<h2>Dough</h2>
	<p>
		<input type="radio" name="dough" value="Regular">&nbsp;&nbsp;Regular</input><br/>
		<input type="radio" name="dough" value="Whole Grain">&nbsp;&nbsp;Whole Grain</input><br/>
		<input type="radio" name="dough" value="Sourdough">&nbsp;&nbsp;Sourdough</input><br/>
	</p>
	</div>
	
	<div id="toppingdiv2">
	<h2>Sauce</h2>
	<p>
		<input type="radio" name="sauce" value="Classic Tomato">&nbsp;&nbsp;Classic Tomato</input><br/>
		<input type="radio" name="sauce" value="Tomato & Herb">&nbsp;&nbsp;Tomato & Herb</input><br/>
		<input type="radio" name="sauce" value="Siracha Marinara">&nbsp;&nbsp;Siracha Marinara</input><br/>
	</p><br/>
	
	<h2>Cheese</h2>
	<p>
		<input type="radio" name="cheese" value="Mozzarella">&nbsp;&nbsp;Mozzarella</input><br/>
		<input type="radio" name="cheese" value="Provolone">&nbsp;&nbsp;Provolone</input><br/>
		<input type="radio" name="cheese" value="Four Cheese Base">&nbsp;&nbsp;Four Cheese Base</input><br/>
	</p>
	</div>
	
	<div id="toppingdiv3">
	<h2>Toppings</h2>
	<p><em>You may select up to five toppings</em><br/> 
		<input type="checkbox" name="toppings[]" value="Mushrooms">&nbsp;&nbsp;Mushrooms</input><br/>
		<input type="checkbox" name="toppings[]" value="Green&nbsp;Olives">&nbsp;&nbsp;Green Olives</input><br/>
		<input type="checkbox" name="toppings[]" value="Roasted&nbsp;Garlic">&nbsp;&nbsp;Roasted Garlic</input><br/>
		<input type="checkbox" name="toppings[]" value="Banana&nbsp;Peppers">&nbsp;&nbsp;Banana Peppers</input><br/>
		<input type="checkbox" name="toppings[]" value="Pineapple">&nbsp;&nbsp;Pineapple</input><br/>
		<input type="checkbox" name="toppings[]" value="Pepperoni">&nbsp;&nbsp;Pepperoni</input><br/>
		<input type="checkbox" name="toppings[]" value="Siracha&nbsp;Chicken">&nbsp;&nbsp;Siracha Chicken</input><br/>
		<input type="checkbox" name="toppings[]" value="Italian&nbsp;Sausage">&nbsp;&nbsp;Italian Sausage</input><br/>
		<input type="checkbox" name="toppings[]" value="Salami">&nbsp;&nbsp;Salami</input><br/>
		<input type="checkbox" name="toppings[]" value="Chipotle&nbsp;Steak">&nbsp;&nbsp;Chipotle Steak</input><br/>
	</p>
	<p><br/><input type="submit" class="buttons" value="Continue Order"/></p>
	</div>
	
	<div id="toppingdiv4">
		<img src="imgs/pizza.png" alt="Pizza!"/>
	</div>
	
	</form>
	</div>
	
	<div id="footer">
		<img src="imgs/pizzafooter.png"/>
	</div>
</body>
</html>