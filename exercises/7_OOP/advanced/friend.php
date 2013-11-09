<?php
class Friend {

    var $connection;

    function __construct() {        
        $this->connection = new Database();    
    }

    function friendsListAction()
        {
        $query = "SELECT concat(t1.first_name,' ' , t1.last_name) as name, t1.email 
            FROM users as t1
            LEFT JOIN friends as t2
            on t1.id = t2.friend_id
            WHERE t2.user_id =". $_SESSION['id'];
        $friends = $this->connection->fetch_all($query);                
        $_SESSION['friends'] = $friends;    
        }

    function usersListAction()
    {        
        $query = "SELECT id, concat(first_name,' ' , last_name) as name, email, (select count(*) from friends where user_id = id and friend_id = ".$_SESSION['id'].") as is_friend FROM users";
        $all_users = $this->connection->fetch_all($query);        
        $_SESSION['all_users'] = $all_users;
    }
    
    function addFriendsAction()
    {        
        $query = "INSERT INTO friends (friend_id, user_id) VALUES ('{$_SESSION['friends_id']}','{$_SESSION['id']}')";
        $query2 = "INSERT INTO friends (friend_id, user_id) VALUES ('{$_SESSION['id']}','{$_SESSION['friends_id']}')";
        mysql_query($query);
        mysql_query($query2);
        $messages = array();
        $messages[] = "Added friend successfully";
        $_SESSION['messages'] = $messages;
        unset($_POST['action']);  
        header('location: home.php');      
    }
}
?>
