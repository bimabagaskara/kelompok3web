<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Daftar_android extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get() { 
        $sumber_rezeki = $this->db->get('user')->result();
        $this->response(array("result"=>$sumber_rezeki, 200));
    }

}
?>