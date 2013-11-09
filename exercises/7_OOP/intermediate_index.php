<!doctype html>
<html>
<head>
	<meta charset="uft-8">
	<title>Animals with Inheritance</title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
	<?php include("intermediate_class_lib.php") ?>
</head>
<body>
	<div class='container'>
		<h3>Animals with Inheritance</h3>
		<?php
		$animal = new Animal('animal');

		$animal->walk();
		$animal->walk();
		$animal->walk();
		$animal->run();
		$animal->run();
		// $animal->fly();
		// $animal->pet();
		$animal->displayHealth();

		$dog = new Dog('Filou');

		echo "<br><br>";
		$dog->walk();
		$dog->walk();
		$dog->walk();
		$dog->run();
		$dog->run();
		$dog->pet();
		$dog->displayHealth();

		$dragon = new Dragon('Toothless');

		echo "<br><br>";
		$dragon->walk();
		$dragon->walk();
		$dragon->walk();
		$dragon->run();
		$dragon->run();
		$dragon->fly();
		$dragon->fly();
		$dragon->displayHealth();
		?>
	</div>

</body>
</html>