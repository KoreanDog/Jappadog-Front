<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supply extends Application
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
		$this->data['pagebody'] = 'supply';
		$this->data['pagetitle'] = 'JappaDog';

		$source = $this->supplies->all();

		function cmp($a, $b)
		{
			return strcmp($a['name'], $b['name']);
		}

		usort($source, "cmp");

		$ingredients = array ();
		foreach ($source as $record)
		{
			$ingredients[] = array ('name' => $record['name'],
															'instock' => $record['instock'],
															'receiving' => $record['receiving'],
															'measurement' => $record['measurement']);
		}
		$this->data['ingredients'] = $ingredients;

		$this->render();
	}


}
