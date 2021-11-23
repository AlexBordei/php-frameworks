<?php

namespace Filter;

class FilterController {
	
	private $input;
	private $price;
	private $input_f;
	
	public function __construct() {
		if(!empty($_GET)) {
			$this->input = !empty($_GET['search']) ? $_GET['search'] : false;
			$this->price = (!empty($_GET['price']) && is_numeric($_GET['price'])) ? floatval($_GET['price']) : false;
		}

		$this->input_f = ($this->input !== false) ? trim($this->input) : false;
		
	}
	
	public function load() {
		
		$model_obj = new FilterModel($this->input_f, $this->price);
		$results = $model_obj->get_results();
		
		$view_obj = new FilterView($results);
		$view_obj->generate_output();
		
	}
	
}
