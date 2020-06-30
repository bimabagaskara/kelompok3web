<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

    //load model
    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('konfigurasi_model');
    }

    //konfigurasi umum
    public function index()
    {
        $konfigurasi    = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('namaweb','Nama website','required',
            array( 'required'  => '%s harus diisi'));

        if($valid->run()===FALSE) {
        //end validasi

        $data = array( 'title' => 'Konfigurasi Website',
                       'konfigurasi' => $konfigurasi,
                        'isi'  => 'admin/konfigurasi/list'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //masuk database
        }else{
            $i = $this->input;

            $data = array( 'id_konfigurasi'         => $konfigurasi->id_konfigurasi,
                           'namaweb'                => $i->post('namaweb'),
                           'tagline'                => $i->post('tagline'),
                           'email'                  => $i->post('email'),
                           'website'                => $i->post('website'),
                           'keywords'               => $i->post('keywords'),
                           'metatext'               => $i->post('metatext'),
                           'telepon'                => $i->post('telepon'),
                           'alamat'                 => $i->post('alamat'),
                           'facebook'               => $i->post('facebook'),
                           'instagram'              => $i->post('instagram'),
                           'deskripsi'              => $i->post('deskripsi'),
                           'rekening_pembayaran'    => $i->post('ururekening_pembayaran')
                        );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah dipudate');
            redirect(base_url('admin/konfigurasi'),'refresh');
        }
        //end masuk database  
    }

    //konfigurasi logo website
    public function logo()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('namaweb','Nama Website','required',
            array( 'required'  => '%s harus diisi'));

        if($valid->run()) {
            // check jika gambar diganti
            if(!empty($_FILES['logo']['name'])) {
                
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';
            $config['max_width']        = '2040';
            $config['max_height']       = '2024';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('logo')) {
        //end validasi

        $data = array( 'title'          => 'Konfigurasi Logo Website',
                       'konfigurasi'   => $konfigurasi,
                       'error'          => $this->upload->display_errors(),
                       'isi'            => 'admin/konfigurasi/logo'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //masuk database
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());

            //create thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            //lokasi folder thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;//pixel
            $config['height']           = 250;//pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end create

            $i = $this->input;

            $data = array( 'id_konfigurasi'       => $konfigurasi->id_konfigurasi,
                           'namaweb'            => $i->post('namaweb'),
                           //disimpan nama file gambar
                           'logo'          => $upload_gambar['upload_data']['file_name']
                        );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi/logo'),'refresh');
        }}else{
          //edit produk tanpa ganti gambar  
          $i = $this->input;

            $data = array( 'id_konfigurasi'       => $konfigurasi->id_konfigurasi,
                           'namaweb'            => $i->post('namaweb'),
                           //disimpan nama file gambar
                           //'logo'          => $upload_gambar['upload_data']['file_name']
                        );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi/logo'),'refresh');
        }}
        //end masuk database
        $data = array( 'title'          => 'Konfigurasi Logo Website',
                       'konfigurasi'   => $konfigurasi,
                       'isi'            => 'admin/konfigurasi/logo'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //konfigurasi icon website
    public function icon()
    {
        $konfigurasi = $this->konfigurasi_model->listing();

        //validasi input
        $valid = $this->form_validation;
        
        $valid->set_rules('namaweb','Nama Website','required',
            array( 'required'  => '%s harus diisi'));

        if($valid->run()) {
            // check jika gambar diganti
            if(!empty($_FILES['icon']['name'])) {
                
            $config['upload_path']      = './assets/upload/image/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_size']         = '2400';
            $config['max_width']        = '2040';
            $config['max_height']       = '2024';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('icon')) {
        //end validasi

        $data = array( 'title'          => 'Konfigurasi Icon Website',
                       'konfigurasi'   => $konfigurasi,
                       'error'          => $this->upload->display_errors(),
                       'isi'            => 'admin/konfigurasi/icon'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //masuk database
        }else{
            $upload_gambar = array('upload_data' => $this->upload->data());

            //create thumbnail gambar
            $config['image_library']    = 'gd2';
            $config['source_image']     = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
            //lokasi folder thumbnail
            $config['new_image']        = './assets/upload/image/thumbs/';
            $config['create_thumb']     = TRUE;
            $config['maintain_ratio']   = TRUE;
            $config['width']            = 250;//pixel
            $config['height']           = 250;//pixel
            $config['thumb_marker']     = '';

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            //end create

            $i = $this->input;

            $data = array( 'id_konfigurasi'       => $konfigurasi->id_konfigurasi,
                           'namaweb'            => $i->post('namaweb'),
                           //disimpan nama file gambar
                           'icon'          => $upload_gambar['upload_data']['file_name']
                        );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi/icon'),'refresh');
        }}else{
          //edit produk tanpa ganti gambar  
          $i = $this->input;

            $data = array( 'id_konfigurasi'       => $konfigurasi->id_konfigurasi,
                           'namaweb'            => $i->post('namaweb'),
                           //disimpan nama file gambar
                           //'logo'          => $upload_gambar['upload_data']['file_name']
                        );
            $this->konfigurasi_model->edit($data);
            $this->session->set_flashdata('sukses', 'Data telah diupdate');
            redirect(base_url('admin/konfigurasi/icon'),'refresh');
        }}
        //end masuk database
        $data = array( 'title'          => 'Konfigurasi Icon Website',
                       'konfigurasi'   => $konfigurasi,
                       'isi'            => 'admin/konfigurasi/icon'
                    );
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

}