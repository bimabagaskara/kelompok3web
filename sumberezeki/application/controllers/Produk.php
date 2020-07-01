<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
    }

    //listing
    public function index()
    {
        $site = $this->konfigurasi_model->listing();

        $data = array(  'title'     => 'Produk '.$site->namaweb,
                        'site'      => $site,
                        'isi'       => 'produk/list'
                        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

?>