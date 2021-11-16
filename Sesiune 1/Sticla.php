<?php

class Sticla {
	protected $denumire_produs;
	protected $culoare = "transparent";
	protected $volum = "500ml";
	protected $tip_dop = "metal";

	function __construct($denumire_produs){
		$this->denumire_produs = $denumire_produs;
	} 

	public function deschide() {

	}

	public function inchide() {

	}

	public function toarna() {
		
	}
}


$sticla_de_vin = new Sticla("Sticla de vin");