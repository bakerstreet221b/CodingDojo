<?php
	require('connection.php');

	if (isset($_POST['note']) AND $_POST['note'] != '') {
		$query = "INSERT INTO notes (notes, created_at) VALUES ('".$_POST['note']."', NOW())";
		mysql_query($query);
	};

	if(isset($_POST['delete'])){
		$query = "truncate table notes";
		mysql_query($query);
		header('location: index.php');
	};
	
	
	$posts = fetch_all("SELECT * FROM notes");
	// var_dump($posts);
	$html = NULL;
	foreach ($posts as $post) {
		$html .= "<div class='postit'>".$post['notes']."</div>";
	};

	$data['html'] = $html;
	echo json_encode($data);

?>