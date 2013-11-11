<?php
class person {
	var $name;

	public $height;
	protected $social_insurance;
	private $pinn_number;

	function __construct($persons_name) {
		$this->name = $persons_name;
	}

	private function get_pinn_number() {
		return $this->$pinn_number;
	}

	public function get_name() {
		return $this->name;
	}

	protected function set_name($new_name) {
		if ($new_name != "Jimmy Two Guns") {
			$this->name = strtoupper($new_name);
		}
	}	
}
class employee extends person {
	protected function set_name($new_name) {
		if ($new_name == "Stefan Lamp") {
			$this->name = $new_name;
		}
		else if($new_name == "Herbert Hawnthorn") {
			parent::set_name($new_name);
		}
	}

	function __construct($employee_name) {
		$this->set_name($employee_name);
	}
}

?>