<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//location: application/controller/auth.php
 
class paketwisatan extends CI_Controller {
        public function __construct() {
            parent::__construct();

  
           $this->load->model('Categorymedia_model');
         
            $this->load->model('slider_model');
            $this->load->model('setting_model');
            $this->load->model('paketwisata_model');
            $this->load->model('contents_model');
            $this->load->model('events_model');
            $this->load->model('navigations_model');    
            $this->load->model('media_model'); 
             $this->load->model('peta_model');  
            $this->load->model('evencal_model', 'evencal');
            $this->load->library('calendar', _setting());           
        }
 
        public function index()
          {    
          $contents = $this->paketwisata_model->get_all();
            $data = array(
                'paketwisata_data' => $contents,
                'title'=> 'paket wisata Data',
                'header' => 'frontend/header1',
                'contents' => 'frontend/paketwisata/paketwisata_list',
                'footer' => 'frontend/footer'

            );    $this->load->view('frontend/paketwisata/paketwisata_list',$data);
         

        }

       
          public function pesan($id) 
        {
            $row = $this->paketwisata_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('paketwisatan/update_action'),
            'id' => set_value('id', $row->id),
            'nama' => set_value('nama', $row->nama),
           
            'nama_paket' => set_value('nama_paket', $row->nama_paket),
            'harga' => set_value('harga', $row->harga),
            'path' => set_value('path', $row->path),
            'keterangan' => set_value('keterangan', $row->keterangan),
            'published' => set_value('published', $row->published),
            'metatittle' => set_value('metatittle', $row->metatittle),
            'metadest' => set_value('metadest', $row->metadest),
            'metakey' => set_value('metakey', $row->metakey),   
           'title'=> 'pesan Paket Wisata',         
            'header' => 'frontend/header1',
            'contents' => 'frontend/paketwisata/paketwisata_form',
            'footer' => 'frontend/footer'
            );
                $this->load->view('frontend/paketwisata/paketwisata_form', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('paketwisatan'));
            }
        }
        
        public function update_action() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
            'nama' => $this->input->post('nama',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            'harga' => $this->input->post('harga',TRUE),
            'path' => $this->input->post('path',TRUE),
             'nama_paket' => $this->input->post('nama_paket',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'url'   => url_title($this->input->post('name',TRUE), '-', TRUE),
            'metatittle' => $this->input->post('metatittle',TRUE),
            'metadest' => $this->input->post('metadest',TRUE),
            'metakey' => $this->input->post('metakey',TRUE),
            'update_at' => time(),
            );

                $this->paketwisata_model->update($this->input->post('id', TRUE), $data);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
                redirect(site_url('paketwisata'));
            }
        }
}
 
/* End of file Blogs.php */
/* Location: ./application/controllers/Blogs.php */