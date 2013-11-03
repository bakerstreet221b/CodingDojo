<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Direction Information</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#dir_form').submit(function(){
				$.get($(this).attr("action"), $(this).serialize(), function(response){
					var startpoint = response.routes[0].legs[0].start_address.split(',').splice(0,2).join(',');
					var endpoint = response.routes[0].legs[0].end_address.split(',').splice(0,2).join(',');
					var steps = new Array();
					steps.push("<ol>")
					for(var i = 0; i < response.routes[0].legs[0].steps.length; i++) {
						steps.push("<li>"+response.routes[0].legs[0].steps[i].html_instructions+"</li>")
					};
					steps.push("</ol>");
					var step = steps.join('');
					
					$('#outline').html("<h2>Directions from "+startpoint+" to "+endpoint+"</h2>"+step);
					}, "json" );
				return false;
			});
		});
	</script>
	<style type="text/css">	
	.dropdown {
		margin-top: 15px;
		margin-right: 10px;
	}
	</style>
</head>
<body>
	<div class="container">
        <h1>Get directions with Google Directions API</h1>
    </div> 

    <div class="navbar navbar-default navbar-static">
    	<div class="container">
	        <div class="navbar-collapse collapse">
	        	<form id='dir_form' class='navbar-form' action='http://maps.googleapis.com/maps/api/directions/json?' method='get'>
	        		<!-- <input type='hidden' name='output' value='json'> -->
	        		<div class="form-group">
	        			<input type="text" placeholder="From" class="form-control" name="origin">
	        		</div>
	        		<div class="form-group">
	        			<input type="text" placeholder="To" class="form-control" name="destination">
	        		</div>
	        		<input type='hidden' name='sensor' value='false'>	        		
	        		<input type='submit' id='btn' class='btn btn-success' value='Get directions!'>		        
		        </form>
	        </div>
    	</div>
    </div>
    <div class='container'>
    	<div id='outline'></div> 
    	<hr>
    	<footer>Made with love by Thereza, 2013</footer>
    </div>
 

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>
</html>