<?php

abstract class Car {
	public $name;
	public $color;

	abstract public function setName($n);

	public function getName(){
		echo $this->name;
	}

	
}