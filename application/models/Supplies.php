<?php

/**
 * This is a "CMS" model for supplies.
 *
 * @author Derek Larson
 */
class Supplies extends CI_Model {

	var $data = array(
		array('id' => '1',
          'name' => 'Pork Sausage',
          'quantity' => 5),
    array('id' => '2',
          'name' => 'Teriyaki sauce',
          'quantity' => 2),
    array('id' => '3',
          'name' => 'Mayo',
          'quantity' => 3),
    array('id' => '4',
          'name' => 'Seaweed',
          'quantity' => '2'),
    array('id' => '5',
          'name' => 'Bun',
          'quantity' => '6'),
    array('id' => '6',
          'name' => 'Radish',
          'quantity' => '1'),
    array('id' => '7',
          'name' => 'Soya sauce',
          'quantity' => '2'),
    array('id' => '8',
          'name' => 'Cheese',
          'quantity' => '1'),
    array('id' => '9',
          'name' => 'Onion',
          'quantity' => '1'),
    array('id' => '10',
          'name' => 'Special Dressing',
          'quantity' => '2'),
    array('id' => '11',
          'name' => 'Pork Cutlet',
          'quantity' => '1'),
    array('id' => '12',
          'name' => 'Cabbage',
          'quantity' => '1'),
    array('id' => '13',
          'name' => 'Avocado',
          'quantity' => '1'),
    array('id' => '14',
          'name' => 'Cream Cheese',
          'quantity' => '2')
	);

	// Constructor
	public function __construct()
	{
		parent::__construct();
	}

	// retrieve a single quote
	public function get($which)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['id'] == $which)
				return $record;
		return null;
	}

	// retrieve all of the quotes
	public function all()
	{
		return $this->data;
	}

}
