<?php
session_start();
include('connection.php');



?>
<!doctype html>
<html>
<head>
	<meta charset='uft-8'>
	<title>Country Injformation</title>
	<link rel="stylesheet" type="text/css" href="../../dist/css/bootstrap.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<style type="text/css">
	.jumbotron {
		text-align: center;
	}
	.main {
		min-height: 400px;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('submit', '#select_country', function(){
			$.post(
				$(this).attr('action'), $(this).serialize(), function(data){
					$('#box').html(data.html);
				}, "json");
			return false;
		});

	});

	</script>
</head>
<body>
	<div class='container jumbotron'>
		<h1>Countries of the World</h1>
	</div>	
	<div class='navbar navbar-collapse collapse'>
		<div class='container'>
			<form action='process.php' method='post' class='navbar-form' id='select_country'>
				<div class='form-group'>
					<label>Select Country: </label>
				</div>
				<div class='form-group'>
					<?php
									
					function print_select($select, $array)
					{
						$html = "<select class='dropdown' name='".$select."'>";
						foreach ($array as $value) {
							$html .= "<option name='country' value='".$value."'>".$value."</option>";			
						}
						$html .= "</select>";
						echo $html;
					} 

					print_select('country', $_SESSION['selet']);
					?>
				</div>
				<div class='form-group'>
					<input type="hidden" name="action" value="select" />
					<input class='form-control' type='submit' class='btn btn-success' value="Check Info" name='check'>
				</div>
			</form>	
		</div>
	</div>
	<div class='container main'>
		<div class='box'>
			<h3>Country Information</h3>
			<hr>
			<div id='box'></div>
		</div>
		
	</div>
	<div class='container'>
		<hr>
		<footer>Made with love by Thereza, 2013</footer>
	</div>
</body>
</html>