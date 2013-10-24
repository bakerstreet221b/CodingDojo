<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
	<style type="text/css">
	.red {
		color: #FF0000;
		font-family: courier;
	}
	.red2 {
		background-color: #FF0000;
		border: 0px;

	}
	.pink {
		color: #FF4040;
		font-family: courier;
	}
	.dark {
		background-color: #BF3030;
		color: #FF7373;
		border: 0px;
	}
	.black {
		background-color: black;
		border-color: black;
		color: #fff;
	}
	td {
		border: 1px solid #CCCCCC;
		height: 30px;
		min-width: 30px;
		text-align: center;
	}
	thead {
		font-weight: bold;
	}
	</style>
</head>
<body>
	<div class='container'>
		<div class='jumbotron dark'>
			<h1>PHP Exercises - optional</h1>
		</div>
		<h2>Advanced III</h2>
		<h3>Sorting Algorithms (Selection Sort)</h3>
		<p>sort $nums = array(1,5,6,8,3,4,5,2) in an ascending order.<br />
			1. SET $temp to be $nums[1]<br />
			2. Go to line 3.<br />
			3. Print $temp.<br />
			4. If $nums[1] is less than $num[0] do { 1,2,3 } <br />
		</p>
		<h3>Using usort</h3>
<?php
	$nums = array();
	for ($i=0; $i < 100; $i++) { 
		$nums[] = rand(0, 10000);
	};
	function my_sort($a,$b) {
		if ($a === $b) return 0;
		return ($a > $b ? 1 : -1);
	};
	
	usort($nums, 'my_sort');
	foreach ($nums as $num) {
		echo $num . ', '; 
	};

	echo '<h3>Microtime</h3>';
	
	$time_start = microtime();

	usort($nums, 'my_sort');

	$time_end = microtime();
	$time = $time_end - $time_start;

	echo 'Time to run the sort function with 100 values: ' . $time . ' sec<br />';

	$nums2 = array();
	for ($i=0; $i < 10000; $i++) { 
		$nums2[] = rand(0, 10000);
	};

	$time_start = microtime();

	usort($nums2, 'my_sort');

	$time_end = microtime();
	$time = $time_end - $time_start;
	
	echo 'Time to run the sort function with 10000 values: ' . $time . ' sec';
?>
		<h2>Advanced IV</h2>
<?php
?>
		<h2>Advanced V</h2>
<?php

?>
		<h2>Optional 1</h2>
<?php
function num_play($num) {
	for ($i=0; $i < (2*$num); $i++) {
		$count = 1;
		$a = $i;
		if ($i > $num) {
			$a = ((2*$num)-$i);
		} 
		for ($j=0; $j < $a; $j++) { 
			echo $count;
			$count++;
		};
		echo '<br />';
	};
};
num_play(7);
?>
		<h2>Optional 2</h2>
<?php
	function convert_number($num){
		if ($num%2 ==0){
			return $num / 2 . '<br />'; 
		} else {
			return ($num * 3) + 1 . '<br />';
		};
	};
	echo convert_number(4);
	echo convert_number(127);
	echo convert_number(45);
	echo convert_number(44);
	echo convert_number(404);
?>
		<h2>Optional 3</h2>
<?php
	function replace_love($string, $love, $new) {
		return str_replace($love, $new, $string);
	};

	$poem = "Love is patient and kind.<br />Love is not jealous or boastful or proud or rude.<br />Love does not demand its own way.<br />Love is not irritable, and it keeps no record of being wronged.<br />Love does not rejoice about injustice but rejoices whenever the truth wins out.<br />Love never gives up, never loses faith, is always hopeful, and endures through every circumstance.<br />";
	echo $poem;
	echo '<br />';
	echo replace_love($poem, 'Love', 'Nature');
?>
		<h2>Optional 4</h2>
		<h3>List of Squares</h3>
<?php
	function list_squares($num) {
		for ($i=1; $i <= $num; $i++) { 
			echo $i . ' x ' . $i . ' = ' . pow($i, 2) . '<br />';
		}
	};
	list_squares(10);
?>
		<h2>Optional 5</h2>
<?php
	function names($names) {
		sort($names, SORT_NUMERIC);
		foreach ($names as $name) {
			echo $name . '<br />';
		};
		
		echo 'Why does SORT_NUMERIC sort the strings first alphabetical before it does sort them by length?<br /><br />';

		function sort_by_length($a,$b){
  			if($a == $b) return 0;
  			return (strlen($a) > strlen($b) ? -1 : 1);
			};
		usort($names,'sort_by_length');
		foreach ($names as $name) {
			echo $name . '<br />';
		};
		echo 'Is sort_by_length a bubble-sort?';
	};
	$names = array('KB','John','Oliver', 'Mikey','Michael');
	names($names);
?>
		<h2>Optional 6</h2>
			<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<input type="text" placeholder="Type text" name="user_input">
			<input type="submit" value="send">
			</form>	
<?php
	function reverse_string($string){
		return strrev($string);
	};
	
	if (isset($_GET['user_input'])) {
		$user_input = $_GET['user_input'];
		echo '<br />Your reverse input results to: ';
		echo reverse_string($user_input);
	};	
?>
	<footer><hr>by Thereza Scherrer, 2013</footer>
	</div>
</body>
</html>