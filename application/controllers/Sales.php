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
	function __construct(){
        parent::__construct();
    }

    public function index() {
        // What is the user up to?
       if ($this->session->has_userdata('order')) {
           $this->keep_shopping();
       } else {
           $this->summarize();
       }
    }

    public function add($item) {
        $order = new Order($this->session->userdata('order'));
        $order->addItem($item);
        $this->session->set_userdata('order',(array)$order);
        $this->keep_shopping();
        redirect('/sales/neworder');
    }
    public function keep_shopping()
    {
        $order = new Order($this->session->userdata('order'));
        $stuff = $order->receipt();
        $this->data['receipt'] = $this->parsedown->parse($stuff);
        $this->data['pagebody'] = 'sales_menu';
        $source = $this->Stock->all();
        $this->data['stock'] = $source;    // allows use variables in views
        $this->render('template_sales');
    }
    public function checkout() {
        $order = new Order($this->session->userdata('order'));
        // ignore invalid requests
        if (!$order->validate())
            redirect('/sales/neworder');
        $order->save();
        $this->session->unset_userdata('order');
        redirect('/sales');
    }
    public function cancel()
    {
        // Drop any order in progress
        if ($this->session->has_userdata('order')) {
            $this->session->unset_userdata('order');
        }
        $this->index();
    }
    // new order if none
    public function neworder()
    {
        // create a new order if needed
        if (!$this->session->has_userdata('order')) {
            $order = new Order();
            $this->session->set_userdata('order', (array) $order);
        }
        $this->keep_shopping();
    }
    public function summarize() {
        // identify all of the order files
        $this->load->helper('directory');
        $candidates = directory_map('../data/');
        $parms = array();
        foreach ($candidates as $filename) {
           if (substr($filename,0,5) == 'order') {
               // restore that order object
               $order = new Order ('../data/' . $filename);
            // setup view parameters
               $parms[] = array(
                   'number' => $order->number,
                   'datetime' => $order->datetime,
                   'total' => $order->total()
                       );
            }
        }
        $this->data['orders'] = $parms;
        $this->data['pagebody'] = 'summary';
        $this->render('template');  // use the default template
    }
    public function examine($which) {
        $order = new Order ('../data/order' . $which . '.xml');
        $stuff = $order->receipt();
        $this->data['content'] = $this->parsedown->parse($stuff);
        $this->render();
    }
	/*public function index()
	{
		$this->data['pagebody'] = 'sales/menu';
		$this->data['pagetitle'] = 'Sales';

		$source = $this->Stock->all();
		$menu = array ();
		foreach ($source as $record)
		{
			$menu[] = array (
				'id' => $record['id'],
				'name' => $record['name'],
				'description' => $record['description'],
				'href' => $record['href'],
				'instock' => $record['instock'],
				'price' => $record['price']);
		}
		$this->data['menu'] = $menu;
		$this->render();
	}

	public function itemdetail($name)
	{
		$this->data['pagebody'] = 'sales/itemdetail';
		$menu = $this->Stock->get($name);
		$this->data['id'] = $menu['id'];
		$this->data['name'] = $menu['name'];
		$this->data['description'] = $menu['description'];
		$this->data['href'] = $menu['href'];
		$this->data['instock'] = $menu['instock'];
		$this->data['price'] = $menu['price'];
		$this->data['pagetitle'] = $menu['name'];
		$this->render();
	}*/
}