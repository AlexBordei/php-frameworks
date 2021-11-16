<?php

interface client_int {
	//metodele publica get_client, set_fullname si set_localitate
	public function get_client();
	public function set_fullname($nume, $prenume);
	public function set_localitate($localitate);


}