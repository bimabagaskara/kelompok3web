<?php 
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Produk extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
    }

    public function index_get() 
    {
        $id_produk = $this->get('id_produk');
        if ($id_produk === null) {
            $produk = $this->produk->getProduk();
        } else {
            $produk = $this->produk->getProduk($id_produk);
        }
        
        if($produk) {
            $this->response([
                'status' => true,
                'data' => $produk
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_produk = $this->delete('id_produk');

        if ($id_produk === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if( $this->produk->deleteProduk($id_produk) > 0 ) {
                // ok
            $this->response([
                'status' => true,
                'id_produk' => $id_produk,
                'message' => 'deleted.'
            ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                // id not found
            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    public function index_post()
    {
        $data = [
            'nama_produk' => $this->post('nama_produk'),
            'kode_produk' => $this->post('kode_produk'),
            'nama_kategori' => $this->post('nama_kategori'),
            'harga' => $this->post('harga'),
            'stok' => $this->post('stok'),
            'berat' => $this->post('berat'),
            'ukuran' => $this->post('ukuran'),
            'keterangan' => $this->post('keterangan'),
            'keywords' => $this->post('keywords'),
            'gambar' => $this->post('gambar'),
            'status_produk' => $this->post('status_produk')
        ];

        if( $this->produk->createProduk($data) > 0 ) {
            $this->response([
                'status' => true,
                'message' => 'new produk has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else {
                // id not found
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'nama_produk' => $this->post('nama_produk'),
            'kode_produk' => $this->post('kode_produk'),
            'nama_kategori' => $this->post('nama_kategori'),
            'harga' => $this->post('harga'),
            'stok' => $this->post('stok'),
            'berat' => $this->post('berat'),
            'ukuran' => $this->post('ukuran'),
            'keterangan' => $this->post('keterangan'),
            'keywords' => $this->post('keywords'),
            'gambar' => $this->post('gambar'),
            'status_produk' => $this->post('status_produk')
        ];

        if( $this->produk->updateProduk($data, $id) > 0 ) {
            $this->response([
                'status' => true,
                'message' => 'new produk has been updated.'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
                // id not found
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }




}