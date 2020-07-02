<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Products_android extends REST_Controller {

        function __construct($config = 'rest') {
        parent::__construct($config);
    }

	public function getProducts($id_products = null)
	{ if ( $id_products === null ) {
      return $this->db->get('products')->result_array();
    } else {
      return $this->db->get_where('products', ['id_products' => $id_products])->result_array();
    }
    
    
    }
}