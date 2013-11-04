<?php
	require("connection.php");

	function given($param) {
		return strlen(@$_POST[$param]) > 0;
	}

	$name = mysql_real_escape_string(@$_POST['name']);

	if (given('from_date') && given('to_date') && given('name')) {

		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		$new_from_date = new DateTime($from_date);
		$new_to_date = new DateTime($to_date);
		$start = $new_from_date->format('Y-m-d');
		$end = $new_to_date->format('Y-m-d');

		
		$query = "SELECT * FROM leads 
			WHERE (first_name LIKE '{$name}%' OR last_name LIKE '{$name}%') 
			AND registered_datetime BETWEEN '".$start."' AND '".$end."'

			ORDER by leads_id DESC";
	}
	else if (given('from_date') && !given('to_date') && given('name')) {

		$from_date = $_POST['from_date'];

		$new_from_date = new DateTime($from_date);
		$start = $new_from_date->format('Y-m-d');
		
		$query = "SELECT * FROM leads 
			WHERE (first_name LIKE '{$name}%' OR last_name LIKE '{$name}%') 
			AND registered_datetime > '".$start."' ORDER by leads_id DESC";
	}
	else if (given('from_date') && !given('to_date') && !given('name')) {

		$from_date = $_POST['from_date'];

		$new_from_date = new DateTime($from_date);
		$start = $new_from_date->format('Y-m-d');
		
		$query = "SELECT * FROM leads 
			WHERE registered_datetime > '".$start."' ORDER by leads_id DESC";
	}
	else if (given('from_date') && given('to_date') && !given('name')) {
		$from_date = $_POST['from_date'];
		$to_date = $_POST['to_date'];

		$new_from_date = new DateTime($from_date);
		$new_to_date = new DateTime($to_date);
		$start = $new_from_date->format('Y-m-d');
		$end = $new_to_date->format('Y-m-d');
		
		$query = "SELECT * FROM leads 
			WHERE registered_datetime BETWEEN '".$start."' 
			AND '".$end."'ORDER by leads_id DESC";
	}
	else {
      	$query = "SELECT * FROM leads 
		WHERE first_name LIKE '{$name}%' 
		OR last_name LIKE '{$name}%'";
	}

	$users = fetch_all($query);		
	$page_num = ceil(count($users)/10);
	
	$html = "</form></div><table class='table table-hover'>
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Registered Datetime</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>";
	$users = fetch_all($query. "LIMIT 0,10");
	if(@$_GET['page'] > 1)
	{
		// echo $_POST['page'];
		// echo $query. "LIMIT".(($_GET['page']*10)-9).",10";
		$users = fetch_all($query."LIMIT ".(($_GET['page']*10)-10).",10");
	}
	foreach ($users as $user) 
	{
		$date = new DateTime($user['registered_datetime']);
		$date = $date->format('Y-m-d');
		$html .= "<tr>
					<td>".$user['leads_id']."</td>
					<td>".$user['first_name']."</td>
					<td>".$user['last_name']."</td>
					<td>".$date."</td>
					<td>".$user['email']."</td>
				</tr>";	
	}
	$html .= "</tbody></table>";

	$data['page_num'] = $page_num;
	$data['html'] = $html;
	echo json_encode($data);

?>