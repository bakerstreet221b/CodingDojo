<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Weather Information</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#weather_api').submit(function(){
				$.get($(this).attr("action")+'?callback=?', $(this).serialize(), function(response){
					var temp = response.data.current_condition[0].temp_F;
					var temp_c = response.data.current_condition[0].temp_C;
					var speed = response.data.current_condition[0].windspeedKmph;
					var descript = response.data.current_condition[0].weatherDesc[0].value;
					var city = response.data.request[0].query.split(',')[0];
					$('#forecast').html("<h2>Weather for: "+city+"</h2>the current tempreatur  F is:  " + temp + "<br>the current tempreatur  C is:  " + temp_c +"<br>the current Windspeed is:  "+speed+" Kmph<br>the Weather Description is: "+ descript);
					}, "json" );
				return false;
			});
		});
	</script>
	<style type="text/css">
	#btn {
		margin-top: 8px;
	}
	.dropdown {
		margin-top: 15px;
		margin-right: 10px;
	}
	</style>
</head>
<body>
	<div class="container">
        <h1>The Coding Dojo weather report!</h1>
    </div> 

    <div class="navbar navbar-default navbar-static">
    	<div class="container">
	        <div class="navbar-collapse collapse">
	        	<form id='weather_api' action='http://api.worldweatheronline.com/free/v1/weather.ashx' method='get'>
	        		<ul class="nav navbar-nav">
			            <li class="dropdown">
			            	<select name='q'>
				            	<option value='Zurich'>Zurich</option>
								<option value='mountain+view'>Mountain View</option>
								<option value='Vancouver'>Vancouver</option>
								<option value='Tokyo'>Tokyo</option>
				            </select>
				        </li>
		        		<li>
			        		<input type='hidden' name='key' value='jtpc4myth9fwxjgwz9fh5fw5'>
			        		<input type='hidden' name='format' value='json'>
			        		<input type='submit' id='btn' class='btn btn-success' value='Get weather!'>
		        		</li>
	 				</ul>
		        </form>
	        </div>
    	</div>
    </div>
    <div class='container'>
    	<div id='forecast'></div> 
    	<hr>
    	<footer>Made with love by Thereza, 2013</footer>
    </div>
 

	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>
</html>