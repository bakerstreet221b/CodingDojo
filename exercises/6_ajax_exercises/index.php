<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Ajax</title>
    <link rel="stylesheet" type="text/css" href="demo/bootstrap.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){
        $("#register").on('submit', function(){
            var form = $(this);
            $.post(form.attr('action'), form.serialize(), function(data){
                if(data.status)
                {
                    alert(data.message);
                }
                else
                {
                    alert(data.error);
                }
            }, "json");
            return false;
        });
    });

	</script>
</head>
<body>
<div class='navbar navbar-inverse'>
	<div class='container'>
		<nav class='collaps navbar-collapse'></nav>
	    <form class='navbar-form navbar-right' id="register" action="process.php" method="post">
	    	<div class='form-group'>
	        <input class='form-control' placeholder='Email' type="text" id="email" name="email"/>
	        </div>
	        <div class='form-group'>
	        <input class='form-control' placeholder='Password' type="text" id="password" name="password"/>
	        </div>
	        <input type="submit" class='btn btn-primary' />
	    </form>
    </div>
</div>
</body>
</html>