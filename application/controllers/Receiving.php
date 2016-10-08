<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Receiving extends Application
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
		$this->data['pagebody'] = 'receiving/index';
		$this->data['pagetitle'] = 'JappaDog';

		$source = $this->receivings->all();

		function cmp($a, $b)
		{
			return strcmp($a['name'], $b['name']);
		}

		usort($source, "cmp");
		/*foreach ($source as $record)
		{
			$ingredients[] = array ('name' => $record['name'],
															'instock' => $record['instock'],
															'receiving' => $record['receiving'],
															'measurement' => $record['measurement']);
		}*/
		$this->data['ingredients'] = $source;

		$this->render();
	}

	public function ingredient($name)
	{
		$name = str_replace("-"," ",$name);
		$ingredient = $this->receivings->get($name);
		$this->data['name'] = $ingredient['name'];
		$this->data['instock'] = $ingredient['instock'];
		$this->data['receiving'] = $ingredient['receiving'];
		$this->data['measurement'] = $ingredient['measurement'];
		$this->data['pagebody'] = 'receiving/single';
		$this->data['pagetitle'] = $ingredient['name'];
		$this->render();
	}
}
