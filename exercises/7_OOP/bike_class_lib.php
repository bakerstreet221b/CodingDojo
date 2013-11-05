<?php
class bike {
	var $price;
	var $max_speed;
	var $miles;
	private $lock_combination;

	public function __construct($price, $max_speed){
		$this->price = $price;
		$this->max_speed = $max_speed;
		$this->miles = 0;
	}

	public function displayInfo() {
		echo $this->price . ", ";
		echo $this->max_speed . ", ";
		echo $this->miles . "<br>";
	}

	public function drive() {
		echo "Driving<br>";
		$this->miles = $this->miles + 10;
	}

	public function reverse(){
		if ($this->miles < 5) {
			echo "No reversing possible<br>";
		}
		else
		{
			echo "Reversing<br>";
			$this->miles = $this->miles - 5;
		}
	}
}
?>