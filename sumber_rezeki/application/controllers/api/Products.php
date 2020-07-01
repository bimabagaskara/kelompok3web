<?php 

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Products extends REST_Controller
{
    public function __construct()
  {
    parent::__construct();
    $this->load->model('Products_model', 'products');
  }
    public function index_get()
    {
        $id_products = $this->get('id_products');
        if ($id_products === null) {
            $products = $this->products->getProducts();
        } else {
            $products = $this->products->getProducts($id_products);
        }
        $products = $this->products->getProducts();
        
        if ($products) {
            $this->response([
                'status' => true,
                'data' => $products
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
    }
}
