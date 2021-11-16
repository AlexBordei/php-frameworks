<?php

trait FirstTrait {
	public function display() {
		echo 'demo';
	}
}

class Test {
	use FirstTrait;

	public function display() {
		$array = [1,2,3,'e'];

		return serialize($array);
	}
}

$test = new Test();
var_dump(unserialize($test->display()));