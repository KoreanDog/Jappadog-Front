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
		$userrole = $this->session->userdata('userrole');
		if ($userrole != 'admin' && $userrole != 'user') {
			$this->data['pagebody'] = 'notauthorized';
			$this->data['pagetitle'] = 'Access Denied';
			$message = 'You are not authorized to access this page.';
			$this->data['content'] = $message;

			$this->render();
			return;
		}

		$this->data['pagetitle'] = 'Receiving';

		if($this->session->flashdata('Success')) {
			$this->data['pagebody'] = 'receiving/success';
			$this->data['success'] = $this->session->flashdata('Success');
		} else {
			$this->data['pagebody'] = 'receiving/index';
		}

		$ingredients = $this->receivings->all();

		function cmp($a, $b)
		{
			return strcmp($a->name, $b->name);
		}

		usort($ingredients, "cmp");
		/*foreach ($source as $record)
		{
			$ingredients[] = array ('name' => $record['name'],
															'instock' => $record['instock'],
															'receiving' => $record['receiving'],
															'measurement' => $record['measurement']);
		}*/
		$this->data['ingredients'] = $ingredients;

		$this->render();
	}

	public function ingredient($id)
	{
		$ingredient = $this->receivings->get($id);
		$this->data['name'] = $ingredient->name;
		$this->data['instock'] = $ingredient->instock;
		$this->data['receiving'] = $ingredient->receiving;
		$this->data['measurement'] = $ingredient->measurement;
		$this->data['id'] = $ingredient->id;
		$this->data['price'] = $ingredient->price;

		if($this->session->flashdata('Success')) {
			$this->data['pagebody'] = 'receiving/single-success';
			$this->data['success'] = $this->session->flashdata('Success');
		} else {
			$this->data['pagebody'] = 'receiving/single';
		}
		$this->data['pagetitle'] = $ingredient->name;
		$this->session->set_flashdata('Single',$ingredient->name);
		$this->render();
	}

	public function order($id)
	{
		$this->receivings->order($id);
		if($this->session->flashdata('Single')) {
			$name = $this->session->flashdata('Single');
			$this->session->set_flashdata('Success', 'Succesfully Ordered');
			redirect('/Receiving/Ingredient/' . $id);
		} else {
			$this->session->set_flashdata('Success', 'Succesfully Ordered');
			redirect('/Receiving');
		}
	}
}
