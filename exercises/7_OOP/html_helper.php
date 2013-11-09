<?php
class HTML_Helper {

	function print_table($users) 
	{
		$title_array = NULL;
		$titles = array_keys(end($users));
		foreach ($titles as $title) {
			$words = explode("_", $title);
			$cap = NULL;
			foreach ($words as $value) {
				$cap .= ucwords($value) . " ";
			}
			$title_array[] = $cap;
		}
		$table = "<table><thead><tr>";
		foreach ($title_array as $title) {
			$table .= "<th>".$title."</th>";
		}
		$table .= "</tr></thead><tbody><tr>";
		foreach ($users as $user) {
			foreach ($user as $value) {
				$table .= "<td>".$value."</td>";
			}
			$table .= "</tr><tr>";
		}
		$table .= "</tr><tbody><table>";
		
		return $table;
	}

	function print_select($select, $array) 
	{
		$html = "<select name='".$select."'>";
		foreach ($array as $value) {
			$html .= "<option value='".$value."'>".$value."</option>";			
		}
		$html .= "</select>";
		return $html;
	}
}
?>
<!Doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>HTML Helper Classes</title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
</head>
<body>
	<div class='container'>
		<h3>HTML Helper Classes</h3>
		<?php
			$my_users = array(array("first_name" => "Michael", "last_name" => "Choi", "nick_name" => "Sensei"),array("first_name" => "Carl", "last_name" => "Horst", "nick_name" => "Karry"));
			$my_select = "States";
			$my_array = array("CA", "WA", "UT", "TX", "AZ", "NY");

			$izas_helpers = new HTML_Helper();

			echo $izas_helpers->print_table($my_users);
			echo "<br>";                                              
			echo $izas_helpers->print_select($my_select, $my_array);
		?>
	</div>

</body>
</html>