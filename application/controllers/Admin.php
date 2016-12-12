<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Application
{

	public function __construct() {
		parent::__construct();
		$this->load->helper('formfields');
		$this->error_messages = array();
	}
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

		$userrole = $this->session->userdata('userrole');
		if ($userrole != 'admin') {
			$this->data['pagebody'] = 'notauthorized';
			$this->data['pagetitle'] = 'Access Denied';
			$message = 'You are not authorized to access this page.';
			$this->data['content'] = $message;

			$this->render();
			return;
		}

		$this->data['pagebody'] = '/admin/suppliespage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'SUPPLIES';



		$receivings = $this->receivings->all();

		$this->data['supplies']=$receivings;

		$this->render();
	}

	public function recipes()
	{
		$userrole = $this->session->userdata('userrole');
		if ($userrole != 'admin') {
			$this->data['pagebody'] = 'notauthorized';
			$this->data['pagetitle'] = 'Access Denied';
			$message = 'You are not authorized to access this page.';
			$this->data['content'] = $message;

			$this->render();
			return;
		}

		$this->data['pagebody'] = '/admin/recipespage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'RECIPES';

		$recipes = $this->productions->all();

		$this->data['recipes']=$recipes;


		$this->render();
	}

	public function stock()
	{
		$userrole = $this->session->userdata('userrole');
		if ($userrole != 'admin') {
			$this->data['pagebody'] = 'notauthorized';
			$this->data['pagetitle'] = 'Access Denied';
			$message = 'You are not authorized to access this page.';
			$this->data['content'] = $message;

			$this->render();
			return;
		}

		$this->data['pagebody'] = '/admin/stockpage';
		$this->data['pagetitle'] = 'Administration Panel';
		$this->data['subtitle'] = 'STOCK';

		$stock = $this->Stock->all();

		$this->data['stock']=$stock;


		$this->render();
	}

	public function editstock($name=null) {

		$record = $this->Stock->get($name);

		$this->data['pagebody'] = '/admin/editstockpage';

    	// build the form fields
		$this->data['sid'] = makeTextField('ID', 'id', $record['id']);
		$this->data['sname'] = makeTextField('Name', 'name', $record['name']);
		$this->data['squantity'] = makeTextArea('Description', 'quantity', $record['quantity']);
		$this->data['sdescription'] = makeTextField('Description', 'description', $record['description']);
		$this->data['sprice'] = makeTextField('Price', 'price', $record['price']);

		$this->data['zsubmit'] = makeSubmitButton('Save', 'Submit changes');
		$this->render();
	}

	function editsupplies($id=null) {

	// try the session first
    $key = $this->session->userdata('key');
    $record = $this->session->userdata('record');

    // if not there, get them from the database
    if (empty($record)) {
            $record = $this->receivings->get($id);
            $key = $id;
            $this->session->set_userdata('key',$id);
            $this->session->set_userdata('record',$record);
    }

	$this->data['pagebody'] = '/admin/editsuppliespage';

		// build the form fields
	$this->data['supid'] = makeTextField('ID', 'id', $record->id);
	$this->data['supname'] = makeTextField('Name', 'name', $record->name);
	$this->data['supinstock'] = makeTextField('In Stock', 'instock', $record->instock);
	$this->data['supreceiving'] = makeTextField('Receiving', 'receiving', $record->receiving);
	$this->data['supmeasurement'] = makeTextField('Measurement', 'measurement', $record->measurement);
	$this->data['suphref'] = makeTextField('Href', 'href', $record->href);
	$this->data['zsubmit'] = makeSubmitButton('Save', 'Submit changes');

		//$this->show_any_errors();
		$this->data['pagetitle'] = 'Edit Item';
		$this->show_any_errors();
	    $this->render();
	}

	function savesupplies() {

        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');

        // if not there, nothing is in progress
        if (empty($record)) {
            $this->index();
            return;
        }
        // update our data transfer object
		$incoming = $this->input->post();
		foreach(get_object_vars($record) as $index => $value)
		    if (isset($incoming[$index]))
		        $record->$index = $incoming[$index];
		$this->session->set_userdata('record',$record);
        // validate
		$this->load->library('form_validation');
		$this->form_validation->set_rules($this->receivings->rules());
		if ($this->form_validation->run() != TRUE)
        $this->error_messages = $this->form_validation->error_array();

            // save or not
	    if (! empty($this->error_messages)) {
	            $this->editsupplies();
	            return;
	    }

	    // update our table, finally!
	    if ($key == null)
	            $this->receivings->add($record);
	    else
	            $this->receivings->update(get_object_vars($record));
	    // clear session variable and redisplay the list
	    $this->cancel(); 
	}

	function addsupply() {
	    $key = NULL;
	    $record = $this->receivings->create();

	    $this->session->set_userdata('key', $key);
	    $this->session->set_userdata('record', $record);    
	    $this->editsupplies();
	}

	function deletesupplies() {
	        $key = $this->session->userdata('key');
	        $record = $this->session->userdata('record');

	        // only delete if editing an existing record
	        if (! empty($record)) {
	                $this->receivings->delete($key);
	        }
	        $this->supplies();
	}

	function show_any_errors() {
	    $result = '';
	    if (empty($this->error_messages)) {
	        $this->data['error_messages'] = '';
	        return;
	    }
	    // add the error messages to a single string with breaks
	    foreach($this->error_messages as $onemessage)
	        $result .= $onemessage . '<br/>';
	    // and wrap these per our view fragment
	    $this->data['error_messages'] = $this->parser->parse('errors',
	            ['error_messages' => $result], true);
	}

	function cancel() {
	    $this->session->unset_userdata('key');
	    $this->session->unset_userdata('record');
	    redirect('/admin/supplies');
	}

}
