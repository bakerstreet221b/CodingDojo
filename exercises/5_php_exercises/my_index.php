<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h2>Functions for Strings</h2>
<?php
$x = "Tell me a story of Tomorrow";
$array = array('ready', 'set', 'go');
$y = array(	strlen($x),	
	strtolower($x),
	strtoupper($x),
	ucwords($x),
	str_replace('Tomorrow', 'Jake and Finn', $x),
	stristr($x, 'me'),
	stristr($x, 'of'),
	strpos($x, 'a'),
	implode(',', $array)
	);
	foreach ($y as $each) {
		echo $each . '<br />';
	};
	$pieces = explode(" ", $x);
	foreach ($pieces as $each) {
		echo $each . ' ';
	};
?>
		<h2>Functions for Arrays</h2>
<?php
	$numbers = array(1,2,13,4,5,6,7,8,9);
	echo "<h4>shuffle</h4>";
		shuffle($numbers);
		foreach ($numbers as $value) {
		echo $value . ' ';
		};

	echo "<h4>sort</h4>";
		sort($numbers);
		foreach ($numbers as $value) {
		echo $value . ' ';
		};
	echo "<h4>count</h4>";
		echo count($numbers);
		
	echo "<h4>isset</h4>";
		var_dump(isset($numbers));
		echo " -> expected: true";
		
	echo "<br>";	
		var_dump(isset($g));
		echo " -> expected: false";
		
	echo "<h4>empty</h4>";
		var_dump(empty($numbers));
		echo " -> expected: false";
		
	echo "<br>";	
		var_dump(empty($g));
		echo " -> expected: true";	
?>
		<h2>Functions for Numbers</h2>
<?php
	$number = 2;
	echo "Number: ".$number."<br />";
	echo "Numbers: ";
	var_dump($numbers = array(1,2,3,4,5));
	echo "<br />Number is_numeric? ";
	
	if (is_numeric($number)){
		echo "Number is numeric.";
	} else {
		echo "Number is NOT numeric.";
	};

	echo "<br />Numbers is_numberic? ";
	if (is_numeric($numbers)){
		echo "Numbers is numeric.";
	} else {
		echo "Numbers is NOT numeric.";
	};
?>	
		<h2>for loop</h2>
<?php
	$array = array(1,2,3,4,5,6,7,8,9);
	for($i=0; $i<count($array); $i++) {
		echo $array[$i] . " ";
	};
?>
		<h2>foreach with associative arrays</h2>
<?php
	$users = array( 
	    array("first_name" => "Michael", "last_name" => "Choi"), 
	    array("first_name" => "John", "last_name" => "Supsupin"), 
	    array("first_name" => "Mark", "last_name" => "Guillen") 
		);
	foreach ($users as $user) {
		if ($users[0] == $user){
			echo "Hello<br>Name: ";	
		} else {
			echo "<br>Name: ";
		};
		
	 	foreach ($user as $key => $value) {
	 		echo $value . " ";
	 	};
	};	 
?>
		<h2>While loop</h2>	
<?php
	$i = 0;
	while ($i < 34) {
		echo "pip ";
		$i++;
	};
?>
	<h2>Do While loop</h2>	
<?php
	$i = 0;
	Do {
		echo "pip ";
	} while ($i > 0);
?>
	<h2>Functions</h2>
		<h3>Average</h3>	
<?php
	

	function average($array){
		$total = 0;
		foreach ($array as $each){
			$total += $each;
		};
		return "The average of this array is " . $total/count($array);		
	};
	
	$ten = array(1,2,3,4,16,17,18,19);
	echo average($ten);
?>
		<h3>Reverse</h3>
<?php
	function my_reverse($data){
		$revdata = array();
		for ($i=count($data)-1;$i>=0;$i--){
			if (is_numeric($data[$i])) {

				$revdata[] = $data[$i];

			} else {
				$str = $data[$i];
				$revstr = "";
				for($j=strlen($str)-1;$j>=0; $j--){
					$revstr .= $str[$j];
				};
				$revdata[] = $revstr;
			};
		};
		return $revdata;
	};
	$random = array(1,34,"dash",67,8,"raindbow", "fluttershy");
	$output = my_reverse($random);
	foreach ($output as $value) {
		echo $value . " ";
	};
?>
		<h3>Rolling the Dice</h3>
<?php
function roll_dice($max) {
	$dice = array(0,0,0,0,0,0,0);
	$prev_die = 0;
	for($i = 0; $i < $max; $i++) {
		$die = rand(1,6);
		$dice[$die]++ ;
		// echo ($die == $prev_die? "Result: " . $die . " Wow. You rolled the same number twice in a row!<br />" : "Result: " . $die . "<br />");
		// $prev_die = $die;
	};
	
	echo "<ul>";
	foreach ($dice as $key => $value) {	
		if ($key > 0){
			$perc = ($value * 100) / $max;
			echo "<li>Number " . $key . " : 
			" . $value . "/" . $max . " times (" . $perc . "%)</li>";	
		};
	};
	echo "</ul>";
};
roll_dice(50);
roll_dice(1000);
?>
		<footer><hr>by Thereza Scherrer, 2013</footer>
	</div>
</body>
</html>