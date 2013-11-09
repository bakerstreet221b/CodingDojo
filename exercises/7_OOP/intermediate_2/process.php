<?php
	include("connection.php");
	session_start();



class Process {

	var $connection;

	public function __construct(){

		$this->connection = new Database();

		if(isset($_POST['action'])&& $_POST['action'] == 'select') {
			$this->selectAction();
		}
		else
		{
			$this->selectCountry();
		}

	}

	private function selectAction(){
		
		$query = "SELECT Name, Continent, Region, Population, LifeExpectancy, GovernmentForm FROM Country WHERE Name = '{$_POST['country']}'";
		$country = $this->connection->fetch_all($query);

		$html = NULL;
		foreach ($country as $info) {
			foreach ($info as $key => $value) {
				$html .= "<div>".$key.": ".$value."<div><br>";
			}
		}

		$data['html'] = $html;
		echo json_encode($data);
	}

	public function selectCountry(){
		
		$query = "SELECT Name FROM Country";
		$names = $this->connection->fetch_all($query);

		$select_country = NULL;
		foreach ($names as $name) {	
			foreach ($name as $n) {
				$select_country[] = $n;			
			}		
		}
		// var_dump($select_country);
		$_SESSION['selet'] = $select_country;
		header('Location: index.php');
	}
}


$process = new Process();



?>