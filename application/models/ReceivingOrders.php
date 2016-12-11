<?php
class ReceivingOrders extends CI_Model {

	// Constructor
	public function __construct()
	{
		parent::__construct();
  }

  function getTotalCosts()
  {
    $this->db->select('cost');
    $this->db->from('receivingOrders');
    $result = $this->db->get()->result();
    $costs = 0;
    foreach ($result as $cost) {
      $costs += $cost->cost;
    }
    return $costs;
  }
}
