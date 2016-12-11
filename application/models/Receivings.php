<?php

/**
 * This is a "CMS" model for supplies.
 *
 * @author Derek Larson
 */

define('REST_SERVER', 'http://backend.local');  // the REST server host
define('REST_PORT', $_SERVER['SERVER_PORT']); // the port you are running the server on

class Receivings extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();

		 $this->load->library(['curl', 'format', 'rest']);
	}
	function rules() {
			$config = [
					['field'=>'id', 'label'=>'Supplies Code', 'rules'=> 'required|integer'],
					['field'=>'name', 'label'=>'Supplies Name', 'rules'=> 'required'],
					['field'=>'instock', 'label'=>'Instock Amount', 'rules'=> 'required|integer'],
					['field'=>'receiving', 'label'=>'Box Amount', 'rules'=> 'required|integer'],
					['field'=>'measurement', 'label'=>'Amount Per Box', 'rules'=> 'required|integer'],
					['field'=>'href', 'label'=>'Link Reference', 'rules'=> 'required']
			];
      return $config;
  }
	// retrieve a single quote
	public function get($name)
	{
		// iterate over the data until we find the one we want
		$this->rest->initialize(array('server' => REST_SERVER));
	  $this->rest->option(CURLOPT_PORT, REST_PORT);
	  return $this->rest->get('/supplies/item/id/' . $name);
	}
	// retrieve all of the quotes
	public function all()
	{
		$this->rest->initialize(array('server' => REST_SERVER));
    $this->rest->option(CURLOPT_PORT, REST_PORT);
    return $this->rest->get('/supplies');
	}

	public function  update($id)
	{

	}

	public function order($id)
	{
		$this->rest->initialize(array('server' => REST_SERVER));
		$this->rest->option(CURLOPT_PORT, REST_PORT);
		$supply = $this->rest->get('/supplies/item/id/' . $id);
		$supply->instock = $supply->instock + ($supply->receiving * $supply->measurement);
		$record['id'] = $supply->id;
		$record['instock'] = $supply->instock;
		$record['receiving'] = $supply->receiving;
		$record['measurement'] = $supply->measurement;
		$record['name'] = $supply->name;
		$record['href'] = $supply->href;
		$retrieved = $this->rest->put('/supplies', $record);
	}
}
