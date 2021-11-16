<?php

Interface user_int {
	// metodele publice get_user, get_id, get_email, get_password, set_id, set_email, set_password
	public function get_id();
	public function get_email();
	public function get_password();

	public function set_id($id);
	public function set_email($email);
	public function set_password($password);

}