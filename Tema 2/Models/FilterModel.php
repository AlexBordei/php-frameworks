<?php

namespace Filter;

class FilterModel {
	
	private $input_f;
	private $price;
	
	private static $data = array(
		'Dacia Logan', 'Dacia Duster', 'Ford Focus'
	);

	private static $prices = array(
		'Dacia Logan' => 10.0,
		'Dacia Duster' => 5.0,
		'Ford Focus' => 10.0
	);
	
	public function __construct($a, $price = false) {
		
		$this->input_f = $a;		
		$this->price = $price;
	}
	
	public function get_results() {
		
		if ($this->input_f !== false) {
			
			$final_results = array();
			
			foreach (self::$data as $value) {
				
				if (stripos($value, $this->input_f) !== false) {
				
					$final_results[] = $value;
					
				}
				
			}

			if($this->price !== false) {
				$filtered_results = [];

				foreach($final_results as $result) {
					if(!empty(self::$prices[$result])) {
						if(self::$prices[$result] <= $this->price) {
							$filtered_results[] = $result;
						}
					}
				}

				return $filtered_results;
			}
			
			return $final_results;
			
		} else {
			
			return self::$data;
			
		}		
		
	}
	
	
}
