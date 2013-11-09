<?php
class Animal {
	var $name;
	var $health;

	function __construct($new_animal){
		$this->name = $new_animal;
		$this->health = 100;
	}

	function walk(){
		$this->health -= 1;
	}
	function run(){
		$this->health -= 5;
	}
	function displayHealth() {
		echo $this->name . "<br>" . $this->health; 
	}
}

class Dog extends Animal {

	function __construct($new_animal){
		parent::__construct($new_animal);
		$this->health = 150;
	}

	function pet() {
		$this->health += 5;
	}
}

class Dragon extends Animal {
	function __construct($new_animal){
		parent::__construct($new_animal);
		$this->health = 170;
	}

	function fly(){
		$this->health -= 10;
	}
	function displayHealth() {
		parent::displayHealth();
		echo '<br>this is a dragon!';
	}
}

?>