<?php

interface a {
	public function foo();
}

interface b {
	public function bar();
}

interface c extends a,b {
	public function baz();
}


class Test implements c {
	public function foo() {

	}

	public function bar() {

	}

	public function baz() {
		
	}
}
