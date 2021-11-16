<?php

class User {
	const PASS_LENGTH = 8;

	public static $prop_statica = "test";

	private $is_logged_in = false;

	public function login($username, $password) {
		if($username === 'alex' && $password === '1234') {
			$this->is_logged_in = true;

			return true;
		}

		return false;
	}

	public function how_long() {
		return self::PASS_LENGTH;
	}

	public static function prop_statica() {
		return self::$prop_statica;
	}
	public function is_logged_in() {
		return $this->is_logged_in;
	}
}