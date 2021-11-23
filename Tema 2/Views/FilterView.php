<?php

namespace Filter;

class FilterView {
	
	private $results;
	
	public function __construct($a) {
		
		$this->results = $a;
		
	}
	
	public function generate_output() {
		
		require_once('Templates/Filter.tpl.php');
		
	}
	
}
