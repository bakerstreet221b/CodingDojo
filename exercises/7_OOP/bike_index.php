
<!DOCTYPE html>
<html>
<head>
	<meta charset="uft-8">
	<title>My Bike</title>
	<?php include("bike_class_lib.php");?>
</head>
<body>
	<div class='container'>
		<h3>Classes of Bikes</h3>
		<?php
		$bike1 = new Bike(0, "25mph");
		$bike2 = new Bike(0, "25mph");
		$bike3 = new Bike(0, "25mph");
		
		$bike1->drive();
		$bike1->drive();
		$bike1->drive();
		$bike1->reverse();
		$bike1->displayInfo();

		$bike2->drive();
		$bike2->drive();
		$bike2->reverse();
		$bike2->reverse();
		$bike2->displayInfo();

		$bike3->reverse();
		$bike3->reverse();
		$bike3->reverse();
		$bike3->displayInfo();

		?>
	</div>
</body>
</html>