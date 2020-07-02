<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Orders extends REST_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Orders_model', 'orders');
    }
    public function index_get() 
    {
        $id_order = $this->get('id_order');
        if ($id_order === null) {
            $orders = $this->orders->getOrders();
        } else {
            $orders = $this->orders->getOrders($id_order);
        }
        

        if($orders) {
            $this->response([
                    'status' => TRUE,
                    'data' => $orders
                ], REST_Controller::HTTP_OK);
        }

    }
}