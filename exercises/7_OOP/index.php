<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>OOP in PHP</title>

	<?php include("class_lib.php"); ?>

</head>
<body>
	<div class='container'>
	<?php
		$stefan = new person("Stefan Mischock");


		echo "Stefan's full name: " . $stefan->get_name();

		// echo "Tell me private stuff: " . $stefan->$pinn_number;
	?>

	</div>
</body>
</html>