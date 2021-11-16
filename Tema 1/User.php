<?php

namespace Account;

require_once "Interface-user.php";

class User implements \user_int {
	protected $id;
	protected $email;
	protected $password;

	// 	- clasa va avea un constructor care va primi id, email si parola urmand sa populeze automat proprietatile object-ului
	public function __construct($id, $email, $password) {
		$this->set_id($id);
		$this->set_email($email);
		$this->set_password($password);
	}

	// - metoda publica: get_user (returneaza id-ul, email-ul si parola sub forma unui array)
	public function get_user() {
		$rezultat = array();

		$rezultat['id'] = $this->id;
		$rezultat['email'] = $this->email;
		$rezultat['parola'] = $this->password;

		return $rezultat;

		// return array(
		// 	'id' => $this->id,
		// 	'email' => $this->email,
		// 	'parola' => $this->parola
		// );
	}

	// - metoda publica: get_id (returneaza id-ul, sub forma de int)
	public function get_id() {
		return (int) $this->id;
	}

	//	- metoda publica: get_email (retunreaza email-ul, sub forma de string)
	public function get_email() {
		return (string) $this->email;
	}

	// 	- metoda publica: get_password (returneaza parola, sub forma de string)
	public function get_password() {
		return strval($this->password);
	}

	//	- metoda publica: set_id (primeste id, schimba valoarea proprietatii de id). metoda nu poate fi suprascrisa
	public final function set_id($id) {
		$this->id = $id;
	}

	//	- metoda publica: set_email (primeste email, schimba valoarea proprietatii de email). metoda nu poate fi suprascrisa
	public final function set_email($email) {
		$this->email = $email;
	}

	// - metoda publica: set_password (primeste parola, schimba valoarea proprietatii de password). metoda nu poate fi suprascrisa
	public final function set_password($password) {
		$this->password = $password;
	}

}