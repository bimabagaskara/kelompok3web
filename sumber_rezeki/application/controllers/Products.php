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
        $this->load->model('Products_android', 'products');

        $this->methods['index_get']['limit'] = 10;
    }

    public function index_get()
    {
        $id_products = $this->get('id_products');
        if ($id_products === null) {
            $products = $this->products->getProducts();
        } else {
            $products = $this->products->getProducts($id_products);
        }
        
        if($products) {
            $this->response([
                    'status' => TRUE,
                    'data' => $products
                ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                    'status' => FALSE,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
        }
    }




}