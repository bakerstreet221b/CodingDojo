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
	<div class="container">
	<div class="jumbotron dark"><h1>PHP Exercises</h1></div>
	<h2>Basic I</h2>
<?php
function my_scores($max) {
	for ($i=0;$i<$max;$i++) {
		$max_score = 100;
		$score = rand(50,100);
		if ($score < 70) {
			echo "<h1 class='red'>Your score is " . $score . "/" . $max_score . "</h1>";
			echo "<h2 class='pink'>Your grade is D.</h2>";
		} elseif ($score >= 70 && $score < 80) {
			echo "<h1 class='red'>Your score is " . $score . "/" . $max_score . "</h1>";
			echo "<h2 class='pink'>Your grade is C.</h2>";
		} elseif ($score >=80 && $score < 90) {
			echo "<h1 class='red'>Your score is " . $score . "/" . $max_score . "</h1>";
			echo "<h2 class='pink'>Your grade is B.</h2>";
		} else {
			echo "<h1 class='red'>Your score is " . $score . "/" . $max_score . "</h1>";
			echo "<h2 class='pink'>Your grade is A.</h2>";
		};
	};
};
my_scores(1);
// my_scores(100);
?>
	<h2>Basic II</h2>
<?php
$states = array('CA', 'WA', 'VA', 'UT', 'AZ');
function my_dropdown ($array) {	
	echo "<select>";
	for($i=0;$i<count($array);$i++){
		echo "<option value=" . $array[$i] .">" . $array[$i] . "</option>";
	};
	echo "</select>";
};
my_dropdown($states);
echo '	';
$states[] = 'NJ';
$states[] = 'NY';
$states[] = 'DE';
my_dropdown($states);
?>
	<h2>Basic III</h2>
	<?php
	function coin_throwing($max_throws) {
		$sides = array(0,0);
		echo "<b class='red'>Starting the program</b><br />";
		for ($i=0;$i<$max_throws;$i++) {
			$side = rand(0,1);
			$sides[$side]++;
			// if ($side == 0) {
			// 	echo "Attempt #" .$i. ": Throwing a coin... It's a head! ... Got " .$sides[0]. " head(s) so far and " .$sides[1]. " tail(s) so far<br />";
			// } else {
			// 	echo "Attempt #" .$i. ": Throwing a coin... It's a tail! ... Got " .$sides[1]. " head(s) so far and " .$sides[0]. " tail(s) so far<br />";
			// };
		};
		echo "Got " .$sides[1]. " head(s) so far and " .$sides[0]. " tail(s)!<br />";
		echo "<b class='pink'>Ending the program - thank you!</b><br />";
	};
	coin_throwing(100);
	coin_throwing(5000);
?>
	<h2>Basic IV</h2>
	<?php
	function get_max_and_min($nums) {
		$max_min = array();
		sort($nums);
		$max_min['max'] = $nums[(count($nums)-1)];
		$max_min['min'] = $nums[0];
		var_dump($max_min);
	};
	$sample = array( 135, 2.4, 2.67, 1.23, 332, 2, 1.02); 
	get_max_and_min($sample);
?>
	<h2>Intermediate I</h2>
	<h3>Part I</h3>
	<?php
	function draw_stars($nums){
		for($i=0;$i<count($nums);$i++) {
			echo str_repeat("*", $nums[$i]) . "<br />";
		}
	};
	$x = array(4, 6, 1, 3, 5, 7, 25);
	draw_stars($x);
?>
	<h3>Part I</h3>
<?php
	function draw_stars2($nums){
		for($i=0;$i<count($nums);$i++) {
			if (is_numeric($nums[$i])) {
				echo str_repeat("*", $nums[$i]) . "<br />";
			} else {
				$s = strtolower($nums[$i][0]);								
				echo str_repeat($s, strlen($nums[$i])) . "<br />";
			};
		}; 
	};
	$x = array(4, "Tom", 1, "Michael", 5, 7, "Jimmy Smith");
	draw_stars2($x);
?>	
	<h2>Intermediate II</h2>
	<?php
	function my_table($rows){
		echo "<table><thead><tr>";
		for ($i=0; $i <= $rows; $i++) {
			if ($i > 0) {
			 	echo '<td>' . $i . '</td>';
			} else {
				echo '<td></td>';
			}; 			
		};
		echo "</tr></thead><tbody><tr>";
		for ($j=1; $j <= $rows; $j++) { 
			for ($h=0; $h <= $rows; $h++) {
				if ($h == 0) {
					echo '<td><b>' . $j . '</b></td>';
				} else {
					echo '<td>' . $h*$j . '</td>';
				};
			};
			echo '</tr><tr>';
		};
		echo "</tr></tbody></table><br />";
	};
	my_table(6);
	my_table(9);
?>
	<h2>Advanced I</h2>
<?php
function users($usr, $title){
	for ($j=0; $j < count($usr); $j++) {
		$keys = array_keys($usr[$j]);
		$usr[$j]['full_name'] = $usr[$j][$keys[0]] . ' ' . trim($usr[$j][$keys[1]]);
		$usr[$j]['full_name_up'] = strtoupper($usr[$j]['full_name']);
		$usr[$j]['full_name_len'] = strlen($usr[$j][$keys[0]] . trim($usr[$j][$keys[1]]));
	};

	echo "<table><thead><tr>";
	foreach ($title as $value) {				
		echo '<td>' . $value . '</td>';							
	};
	echo "</tr></thead><tbody><tr>";
	for ($j=0; $j < count($usr); $j++) {
		if (($j+1)%5 == 0) {
			echo '<td class="black">' . ($j+1) . '</td>';
			foreach ($usr[$j] as $value) {				
				echo '<td class="black">' . $value . '</td>';							
			};
			echo '</tr><tr>';			
		} else {
			echo '<td>' . ($j+1) . '</td>';
			foreach ($usr[$j] as $value) {				
				echo '<td>' . $value . '</td>';							
			};
			echo '</tr><tr>';			
		};	
	};
	echo "</tr></tbody></table><br />";
};

$users = array( 
	   array('first_name' => 'Michael', 'last_name' => ' Choi '),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel'),
	   array('first_name' => 'Michael', 'last_name' => ' Choi '),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel'),
	   array('first_name' => 'Michael', 'last_name' => ' Choi '),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel'),
	   array('first_name' => 'Michael', 'last_name' => ' Choi '),
	   array('first_name' => 'John', 'last_name' => 'Supsupin'),
	   array('first_name' => 'Mark', 'last_name' => ' Guillen'),
	   array('first_name' => 'KB', 'last_name' => 'Tonel')    
);

$titles = array('User #', 'First Name', 'Last Name', 'Full Name', 'Full Name in upper case', 'Length of name');

users($users, $titles);

?>
	<h2>Advanced II</h2>
	<?php
	function chessboard($fields) {
		echo "<table><tbody><tr>";
		for ($i=0; $i < $fields; $i++) { 
			if ($i%2 == 0) {
				$count = 0;		
			} else {
				$count = 1;
			};
					
			for ($j=0; $j < $fields; $j++) { 
				if ($count%2 == 0) {
					echo '<td class="dark"></td>';	
				} else {
					echo '<td class="red2"></td>';
				};				
				$count++;
			};
			echo '</tr><tr>';			
		};
		echo "</tr></tbody></table><br />";
	};
	chessboard(8);
?>
<footer><hr>By Thereza Scherrer, 2013</footer>
</div>
</body>
</html>	