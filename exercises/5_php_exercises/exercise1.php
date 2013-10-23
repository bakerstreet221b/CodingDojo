<!doctype html>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Exercise 1</title>
</head>
<body>
	<h1>Heading 1</h1>
	<p>Paragraph</p>

<?php
	$x = "CodingDojo";
	echo $x;

?>
	<h2>Example 2</h2>

<?php
	$student = array();
	$student[] = "John";
	$student[] = "Jake";
	$student[] = "Finn";

	echo 'First Student in the Array is ' . $student[0] . "<br />";
	var_dump($student);
?>	

	<h3>Example 3</h3>

<?php
	$shop = array(
		array('rose', 1.25, 15),
		array('daisy', 3.25, 10),
		array('orchid', 5.25, 5)
		);
		var_dump($shop);
?>	
</body>
</html>
