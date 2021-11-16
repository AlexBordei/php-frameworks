<?php

require 'Car.php';

class ElectricCar extends Car {
	private $allowed_models = array(
		'Renault Zoe',
		'Skoda CityGo',
		'BMW i3'
	);

	public function setName($n) {
		if(! in_array($n, $this->allowed_models)) {
			throw new Exception($n . " nu este unul din modele agreate " . serialize($this->allowed_models), 1);
		}

		$this->name = $n;
	}
}

