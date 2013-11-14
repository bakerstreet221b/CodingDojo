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
        return $friends;    
        }

    function usersListAction()
    {        
        $query = "SELECT id, concat(first_name,' ' , last_name) as name, email, (select count(*) from friends where user_id = id and friend_id = ".$_SESSION['id'].") as is_friend FROM users";
        $all_users = $this->connection->fetch_all($query);        
        return $all_users;
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
        header('location: home.php');      
    }
}

class Person {

    private $data; // associative array
    private $connection;

    function __construct($data) {
        // Make sure object is initialized into a valid state
        $this->data = $data;
        $this->connection = new Database;
    }

    static function currentUser() {
        // Returns a new object with current user        
        return new Person(array('id' => $_SESSION['id']));
    }

    function getAllFriends() {
        // Return array with all friends as Person objects
        $query = "SELECT concat(t1.first_name,' ' , t1.last_name) as name, t1.email 
            FROM users as t1
            LEFT JOIN friends as t2
            on t1.id = t2.friend_id
            WHERE t2.user_id =".$this->data;            
        $friends = $this->connection->fetch_all($query);                
        // return array_map(function($data) { return new Person($data); }, $friends);    
        $my_friends = new Person($friends);
        foreach ($friends as $key => $value) {
            $my_friends->$key = $value;
        };
        return $my_friends;
       

        
    }

    function getEverybody() {
        // Return array with everybody as Person objects with is_friend property
        $query = "SELECT id, concat(first_name,' ' , last_name) as name, email, (select count(*) from friends where user_id = id and friend_id = ".$this->data.") as is_friend FROM users";
        $all_users = $this->connection->fetch_all($query);        
        $users = new Person($all_users);
        foreach ($all_users as $key => $value) {
            $users->$key = $value;
        };
        return $users;
    }

    function becomeFriendsWith($person) {
        // Creates new friendship between this and other person
        $query = "INSERT INTO friends (friend_id, user_id) VALUES ('{$person}','".$this->data."')";
        $query2 = "INSERT INTO friends (friend_id, user_id) VALUES ('".$this->data."','{$person}')";
        mysql_query($query);
        mysql_query($query2);
        $messages = array();
        $messages[] = "Added friend successfully";
        $_SESSION['messages'] = $messages;
        header('location: home.php');      
    } 

    function __get($name) {
        // Returns a property, one of id, name, email, or is_friend
    }

}

