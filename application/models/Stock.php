<?php

class Stock extends MY_Model {

/*public static $fields =  ['id','name','description','href','price','inStock'];
    public static $rules = [
        ['field'=>'id',     'label'=>'Product ID',  'rules'=>'required|integer'],
        ['field'=>'name',   'label'=>'Product Name', 'rules'=>'required'],
        ['field'=>'description',  'label'=>'Description', 'rules'=>''],
        ['field'=>'href',  'label'=>'href', 'rules'=>''],
        ['field'=>'instock',  'label'=>'Stock on hand', 'rules'=>'required|integer|greater_than_equal_to[0]'],
        ['field'=>'price',    'label'=>'Item price',  'rules'=>'required|decimal']
  ];
*/

	/*var $data = array(
		array('id' => '1',
          'name' => 'Terimayo',
          'quantity' => 3,
          'description' => 'JAPADOG\'s Signature Hot Dog: Teriyaki sauce, mayo and seaweed make for a winning combination',
          'price' => 5),
    array('id' => '2',
          'name' => 'Oroshi',
          'quantity' => 2,
          'description' => 'Freshly grated radish with a special soya sauce. East meets West',
          'price' => 6),
    array('id' => '3',
          'name' => 'SpicyCheese',
          'quantity' => 3,
          'description' => 'Another signature dog contains three types of cheese with a hint of spiciness in the sausage. All that topped with Terimayo sauce makes for a tasty hot dog',
          'price' => 7),
    array('id' => '4',
          'name' => 'SalmonDog',
          'quantity' => '2',
          'description' => 'Topped with fresh onion and our special dressing',
          'price' => 8),
    array('id' => '5',
          'name' => 'Tonkotsu',
          'quantity' => '6',
          'description' => 'Deep fried pork cutlet marinated in tonkatsu sauce topped with fresh cabbage',
          'price' => 5),
    array('id' => '6',
          'name' => 'Avocado',
          'quantity' => 1,
          'description' => 'Topped with Avocado, Cream cheese, Japanese mayo and Soy sauce',
          'price' => 9),
	);*/
	// Constructor
/*  public static function createViewModel($record) {
        $record['id']        = $record['id'];
        $record['name']  = $record['name'];
        $record['description']  = $record['description'];
        $record['href']  = $record['href'];
        $record['price']     = moneyFormat($record['price']);
        $record['instock']   = $record['instock'];
        return $record;
    }
*/	public function __construct()
	{
		parent::__construct();
	}

/*	public function get($name)
	{
		// iterate over the data until we find the one we want
		foreach ($this->data as $record)
			if ($record['name'] == $name)
				return $record;
		return null;
    $query = $this->db->get_where('menu', array('name' => $name));
    $result = $query->result_array();
    return $result;
	}*/

      function rules() {
        $config = [
          ['field'=>'id',     'label'=>'Product ID',  'rules'=>'required|integer'],
          ['field'=>'name',   'label'=>'Product Name', 'rules'=>'required'],
          ['field'=>'description',  'label'=>'Description', 'rules'=>''],
          ['field'=>'href',  'label'=>'href', 'rules'=>''],
          ['field'=>'instock',  'label'=>'Stock on hand', 'rules'=>'required|integer|greater_than_equal_to[0]'],
          ['field'=>'price',    'label'=>'Item price',  'rules'=>'required|decimal']
        ];
        return $config;
    }


/*  public function sell($stock, $quantity) {
        $stock['instock'] = $stock['instock'] - $quantity; 
        if ($stock['instock'] < 0) {
            return "Error: You don't have enough " . $stock['name'] . " in stock.";
        }
        $this->update($stock);
        $name = $stock['name'];
        $data = 'SOLD: '.$quantity.' ' . $name .'(s) on ' . date("Y/m/d") . "\n";
    if ( !file_put_contents(APPPATH.'models\LogFiles\saleReceipt.txt', $data, FILE_APPEND)){
         echo 'Unable to write the file';
    }
/*        $description = 'SOLD: '.$quantity.' ' . $name .'(s)';
        $this->Transaction->add($description);*/
    

/*	public function all()
	{
		return $this->data;
    $query = $this->db->get('menu');
    return $result = $query->result_array();
	}*/
}