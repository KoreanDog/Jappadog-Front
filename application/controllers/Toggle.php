<?php

class Toggle extends Application {
	public function index()	{
		$origin = $_SERVER['HTTP_REFERER'];
		$role = $this->session->userdata('userrole');
		if ($role == 'user') $role = 'admin';
		else if ($role == 'admin') $role = 'guest';
		else if ($role == 'guest') $role = 'user';
		else $role = 'user';
		$this->session->set_userdata('userrole', $role);
		redirect($origin);
	}
}
