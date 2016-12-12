<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sales extends Application
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
		$this->data['pagebody'] = 'sales/menu';
		$this->data['pagetitle'] = 'Sales';
		$source = $this->Stock->all();
		$menu = array ();
		foreach ($source as $record)
		{
			$menu[] = array ('name' => $record['name'], 'quantity' => $record['quantity'], 'description' => $record['description'], 'price' => $record['price']);
		}
		$this->data['menu'] = $menu;
		$this->render();
	}

	public function itemdetail($name)
	{
		$this->data['pagebody'] = 'sales/itemdetail';
		$menu = $this->Stock->get($name);
		$this->data['name'] = $menu['name'];
		$this->data['quantity'] = $menu['quantity'];
		$this->data['description'] = $menu['description'];
		$this->data['price'] = $menu['price'];
		$this->data['pagetitle'] = $menu['name'];
		$this->render();
	}
}