<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['pagebody'] = 'adminpage';
		$this->data['pagetitle'] = 'Administration Panel';



		$this->render(); 
	}

	public function supplies()
	{
		$this->data['pagebody'] = 'adminpage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'SUPPLIES';

		$this->render(); 
	}

	public function recipes()
	{
		$this->data['pagebody'] = 'adminpage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'RECIPES';
		
		$this->render(); 
	}

	public function stock()
	{
		$this->data['pagebody'] = 'adminpage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'STOCK';

		$this->render(); 
	}


}
