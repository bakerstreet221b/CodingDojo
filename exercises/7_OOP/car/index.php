<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Car Comparison</title>
	<?php include("class_lib.php");?>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
</head>
<body>
	<div class='container'>
		<h3>Car Comparison</h3>
		<?php
		$car1 = new Car(2000, 35, "Full", 15);
		$car2 = new Car(2000, 5, "Not Full", 105);
		$car1 = new Car(2000, 15, "Kind of Full", 95);
		$car1 = new Car(12000, 25, "Full", 25);
		$car1 = new Car(12000, 45, "Empty", 25);
		?>
	</div>

</body>
</html>