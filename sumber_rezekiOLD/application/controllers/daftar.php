<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Daftar extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data user
    function index_get() {
        $id_user = $this->get('id_user');
        if ($id_user == '') {
            $sumber_rezeki = $this->db->get('user')->result();
        } else {
            $this->db->where('id_user', $id_user);
            $sumber_rezeki = $this->db->get('user')->result();
        }
        $this->response($sumber_rezeki, 200);
    }

     //Mengirim atau menambah data user baru
     function index_post() {
        $data = array(
                    'id_user'           => $this->post('id_user'),
                    'fullname'          => $this->post('nama'),
                    'email'             => $this->post('email'),
                    'password'          => $this->post('password'),
                    'gender'            => $this->post('gender'),
                    'address'           => $this->post('alamat'),
                    'is_active'            => 1,
                'date_created'=> date ('Y-m-d'));
        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    function index_put() {
        $id_user = $this->put('id_user');
        $data = array(
            'id_user'           => $this->put('id_user'),
            'fullname'          => $this->put('nama'),
            'email'             => $this->put('email'),
            'password'          => $this->put('password'),
            'gender'            => $this->put('gender'),
            'address'           => $this->put('alamat'),
            'is_active'            => $this->put('1'),
        'date_created'=> $this->put('Y-m-d'));
        $this->db->where('id_user', $id_user);
        $update = $this->db->update('user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id_user = $this->delete('id_user');
        $this->db->where('id_user', $id_user);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }




}
?>   