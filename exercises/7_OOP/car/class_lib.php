<?php
class Car {
	var $price;
	var $speed;
	var $fuel;
	var $mileage;
	var $tax;

	public function __construct($price, $speed, $fuel, $mileage){
		$this->price = $price;
		$this->speed = $speed;
		$this->fuel = $fuel;
		$this->mileage = $mileage;

		return $this->Display_all();
	}
	public function Display_all(){
		$this->set_tax($this->price);
		echo "Price: ".$this->price."<br>Speed: ".$this->speed."mph<br>Fuel: ".$this->fuel."<br>Mileage: ".$this->mileage."mpg<br>Tax: ".$this->get_tax()."<br><br>";
	}

	public function set_tax($price){
		if($this->price > 10000)
		{
			$this->tax = 0.15;
		}
		else
		{
			$this->tax = 0.12;
		}
	}

	public function get_tax(){
		return $this->tax;
	}
}

?>