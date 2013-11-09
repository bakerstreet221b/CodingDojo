<?php
	session_start();
	include('connection.php');
    include('friend.php');

    $friend = new Friend();

	if (!isset($_SESSION['logged_in'])) {
		header('Location: login.php');
	};
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
      $friend->addFriendsAction();
      exit();
    }
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Friends Finder</title>
	<link rel="stylesheet" type="text/css" href="../../dist/css/bootstrap.css">
	<style type="text/css">
        #form {
            float: right;
        }
        .container {
            width: 960px;
        }
    </style>
	<script type="text/javascript">

    </script>
</head>
<body>
	<div class='container'>
		<div class='jumbotron'><h1>Friends Finder</h1></div>
        <?php
        if (isset($_SESSION['messages'])) {
            foreach ($_SESSION['messages'] as $message) {
                echo "<div class='alert alert-success'>".$message."</div>";
            }		
            unset($_SESSION['messages']);
        };        
        ?>
		<div class='box' id='greeting'>            
            <form action='process.php' method='post' role='form' id='form'>
                <div id='form-group'>
                <input type='submit' value='Log off' class='btn btn-danger'>
                </div>
            </form>
            <?php
                echo "<h3>Welcome ".$_SESSION['first_name']."<br>".$_SESSION['email']."</h3>";
            ?>
		</div>
		<div class='row'>
			<h2>List of Friends</h2>
            <div class='col-md-6'>
            <?php
            function friendsTable($users)
            {       
                $html = "<table class='table table-bordered'><thead><tr>";
                $titles = array_keys(end($users));
                foreach($titles as $title)
                {
                    $html .= "<th>".ucwords($title)."</th>";
                }
                $html .= "</tr></thead><tbody><tr>";
                foreach($users as $user)
                {                                                                
                    foreach($user as $value)
                    {
                        $html .= "<td>".$value."</td>";
                    }
                    $html .= "</tr><tr>";
                }
                $html .= "</tr></tbody></table>";
                echo $html;
            }
            $friend->friendsListAction();
            if(!empty($_SESSION['friends'])) {                
                friendsTable($_SESSION['friends']);
            }
            else
            {
                echo "<div class='alert alert-info'>No friends added yet.</div>";
            }
//            var_dump($_SESSION['friends']);
            ?>
            </div>    
		</div>
		<div class='row'>
			<h2>List of Users who subscribe to Friends Finder</h2>
            <div class='col-md-7'>
            <?php
            function usersTable($users)
            {       
                $html = "<table class='table table-bordered'><thead><tr>";
                $titles = array_keys(end($users));
                foreach($titles as $title)
                {
                    if(!($title == 'id' || $title == 'is_friend'))
                    {
                    $html .= "<th>".ucwords($title)."</th>";
                    }
                }
                $html .= "<th>Action</th></tr></thead><tbody><tr>";
                foreach($users as $user)
                {                                                                                    
                    foreach($user as $key => $value)
                    {
                        if(!($key =='id' || $key == 'is_friend' || $_SESSION['id'] == $user['id']))
                        {
                        $html .= "<td>".$value."</td>";
                        }
                    }                    
                    if ($_SESSION['id'] == $user['id'])
                    {
                        // $html .= "<td>Self</td>";
                    }
                    elseif($user['is_friend'] == 0)
                    {
                        $_SESSION['friends_id'] = $user['id'];
                        $html .= "<td><form action='home.php' method='post'><input type='hidden' name='action' value='add_friend'><input type='submit' value='Add as Friend' class='btn btn-success'></form></td>";                                        
                    }
                    else
                    {                        
                        $html .= "<td>Friends</td>";
                    }
                    $html .= "</tr><tr>";
                }
                    
                $html .= "</tbody></table>";
                echo $html;
            }    
            $friend->usersListAction();
           
            usersTable($_SESSION['all_users']);

            ?>
            </div>  
		</div>
        <hr>
		<footer>Made with love by Thereza, 2013</footer><br>
	</div>
</body>
</html>