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
          'instock' => 50,
					'receiving' => 1,
					'measurement' => 100),
    array('id' => '2',
          'name' => 'Teriyaki sauce',
          'instock' => 20,
					'receiving' => 2,
					'measurement' => 50),
    array('id' => '3',
          'name' => 'Mayo',
          'instock' => 30,
					'receiving' => 2,
					'measurement' => 50),
    array('id' => '4',
          'name' => 'Seaweed',
          'instock' => 20,
					'receiving' => 2,
					'measurement' => 50),
    array('id' => '5',
          'name' => 'Bun',
          'instock' => 60,
					'receiving' => 3,
					'measurement' => 100),
    array('id' => '6',
          'name' => 'Radish',
          'instock' => 10,
					'receiving' => 2,
					'measurement' => 25),
    array('id' => '7',
          'name' => 'Soya sauce',
          'instock' => 20,
					'receiving' => 2,
					'measurement' => 50),
    array('id' => '8',
          'name' => 'Cheese',
          'instock' => 10,
					'receiving' => 2,
					'measurement' => 50),
    array('id' => '9',
          'name' => 'Onion',
          'instock' => 10,
					'receiving' => 2,
					'measurement' => 25),
    array('id' => '10',
          'name' => 'Special Dressing',
          'instock' => 20,
					'receiving' => 2,
					'measurement' => 50),
    array('id' => '11',
          'name' => 'Pork Cutlet',
          'instock' => 10,
					'receiving' => 2,
					'measurement' => 25),
    array('id' => '12',
          'name' => 'Cabbage',
          'instock' => 10,
					'receiving' => 2,
					'measurement' => 25),
    array('id' => '13',
          'name' => 'Avocado',
          'instock' => 10,
					'receiving' => 1,
					'measurement' => 25),
    array('id' => '14',
          'name' => 'Cream Cheese',
          'instock' => 20,
					'receiving' => 1,
					'measurement' => 50)
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
