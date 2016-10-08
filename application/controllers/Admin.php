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
		$this->data['pagebody'] = '/admin/adminpage';
		$this->data['pagetitle'] = 'Administration Panel';



		$this->render(); 
	}

	public function supplies()
	{
		$this->data['pagebody'] = '/admin/suppliespage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'SUPPLIES';

		$supplies = $this->supplies->all();

		$this->data['supplies']=$supplies;
		$this->data['columntitles']=array(
				array('title'=>'ID'),array('title'=>'NAME'),array('title'=>'IN STOCK'),array('title'=>'RECEIVING'),array('title'=>'MEASUREMENT'),array('title'=>'EDIT'),array('title'=>'DELETE')
			);

		$this->render(); 
	}

	public function recipes()
	{
		$this->data['pagebody'] = '/admin/recipespage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'RECIPES';

		$recipes = $this->productions->all();

		$this->data['recipes']=$recipes;
		$this->data['columntitles']=array(
				array('title'=>'ID'),array('title'=>'NAME'),array('title'=>'IN STOCK'),array('title'=>'RECEIVING'),array('title'=>'MEASUREMENT'),array('title'=>'EDIT'),array('title'=>'DELETE')
			);
		
		$this->render(); 
	}

	public function stock()
	{
		$this->data['pagebody'] = '/admin/stockpage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'STOCK';

		$this->render(); 
	}


}
