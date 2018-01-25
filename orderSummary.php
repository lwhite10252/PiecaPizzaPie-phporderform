<?php
	require("navigationMenu.php");
	require_once("common.php");
	session_start();
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
	<h2 style="margin-left:50px;">Review Your Order</h2>
	
	<div id="summary1">
	<?php
	if (isset($_SESSION['username'])) {
		
		//get user's delivery address information
		$nameResults = $conn->query("SELECT firstname, lastname FROM tblcustomers WHERE email = '".$_SESSION['username']."' LIMIT 1");
		
		$dateResult = $conn->query("SELECT date FROM tblorders WHERE email = '".$_SESSION['username']."' LIMIT 1;");
		
		$addressResults = $conn->query("SELECT address, city, province, postalcode FROM tblcustomers WHERE email = '".$_SESSION['username']."' LIMIT 1");
	
		//print values to screen
		while ($row = $nameResults->fetch_assoc()) {
			echo "Ordered by " . $row['firstname'] . " " . $row['lastname'] . " on "; }

		while($row = $dateResult->fetch_assoc()) {
			echo $row['date'] . ".</p>"; }
		
		while ($row = $addressResults->fetch_assoc()) {
			echo "<p>You may print this page to keep for your records. We have also e-mailed a receipt to " . $_SESSION['username'] . ".</p><p>Pizza will be ready in 40 minutes and will be delivered to the following address:</p>";
			echo $row['address'] . "<br/>";
			echo $row['city'] . ", " . $row['province'] . "<br/>";
			echo $row['postalcode'];
		}	
	} else {
		echo "No orders yet. Please sign in to place an order.";
	}
	?>
	</div>
	
	<div id="summary2">
	<?php
	if (isset($_SESSION['username'])) {
		echo "We're creating a pizza masterpiece for you! You have ordered:<br/><br/>";
			
		//get user's pizza toppings, etc.
		$pizzaResults = $conn->query("SELECT size, dough, cheese, sauce, toppings 
		FROM tblpizza ORDER BY pizzaID DESC LIMIT 1");
			
		//print values to screen
		while ($row = $pizzaResults->fetch_assoc()) {
			echo "1 " . $row['size'] . " pizza<br/>";
			echo "<strong>Dough:</strong> " . $row['dough'] . "<br/>";
			echo "<strong>Sauce:</strong> " . $row['cheese'] . "<br/>";
			echo "<strong>Cheese:</strong> " . $row['sauce'] . "<br/>";
			echo "<strong>Toppings:</strong> " . $row['toppings'] . "<br/><br/>";
			echo "<p>Thank you for placing an order with Pieca Pizza Pie!</p>";
		}
	}
	?>
	</div>
	
	</div>
	
	<div id="footer">
		<img src="imgs/pizzafooter.png"/>
	</div>
</body>
</html>
 
<?php
    //session_destroy();
?>