<?php

namespace Account;

require_once 'Interface-Client.php';

class Client extends User implements \client_int{

	//ne imaginam o serie de parametrii pe care clasa Client ii mosteneste din clasa User
	/*
		$id
		$email
		$password
	*/

	private $nume;
	private $prenume;
	private $fullname;
	private $localitate;

	public function __construct($nume, $prenume, $localitate, User $user) {
			$this->set_fullname($nume, $prenume);
			$this->set_localitate($localitate);
			parent::__construct($user->id, $user->email, $user->password);
			// $this->id = $user->id;
			// $this->email = $user->email;
			// $this->password = $user->password;
	}

	// - metoda publica: get_client (returneaza nume, prenume, fullname, localitate sub forma unui array)
	public function get_client() {
		return array(
			'nume'       => $this->nume,
			'prenume'    => $this->prenume,
			'fullname'   => $this->fullname,
			'localitate' => $this->localitate
		);
	}

	// - metoda publica: set_fullname (primeste nume si prenume, schima valorile proprietatilor de nume, prenume si fullname)
	public function set_fullname($nume, $prenume) {
		$this->nume = ucfirst($nume);
		$this->prenume = ucfirst($prenume);
		$this->fullname = $this->nume . ' ' . $this->prenume;
	}
	
	// - metoda publica: set_localitate (primeste localitate, schimba valoarea proprietatii de localitate)
	public function set_localitate($localitate) {
		$this->localitate = $localitate;
	}
}