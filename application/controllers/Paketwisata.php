<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class paketwisata extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->Auth_model->isLoggedIn();
            $this->load->model('paketwisata_model');
            $this->load->library('form_validation');
        }
 
 
        public function index(){
            //check user logged in or not
            $contents = $this->paketwisata_model->get_all();
            $data = array(
                'paketwisata_data' => $contents,
                'title'=> 'paket wisata Data',
                'header' => 'backend/header',
                'contents' => 'backend/paketwisata/paketwisata_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/Home',$data);
        }     

        public function read($id) 
        {
            $row = $this->paketwisata_model->get_by_id($id);
            if ($row) {
                $data = array(
            'id' => $row->id,
            'name' => $row->name,
            'dest' => $row->dest,
            'type' => $row->type,
            'published' => $row->published,
            'userid' => $row->userid,
            'metatittle' => $row->metatittle,
            'metadest' => $row->metadest,
            'metakey' => $row->metakey,
            'create_at' => $row->create_at,
            'update_at' => $row->update_at,
            );
                $this->load->view('paketwisata_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('paketwisata'));
            }
        }
        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('paketwisata/create_action'),
            'id' => set_value('id'),
            'nama' => set_value('nama'),
            'keterangan' => set_value('keterangan'),
            'nama_paket' => set_value('nama_paket'),
            'harga' => set_value('harga'),
            'path' => set_value('path'),
            'published' => set_value('published'),
            'metatittle' => set_value('metatittle'),
            'metadest' => set_value('metadest'),
            'metakey' => set_value('metakey'),
            'title'=> 'Kelola Paket Wisata',
            'header' => 'backend/header',
            'contents' => 'backend/paketwisata/paketwisata_form',
            'footer' => 'backend/footer'
        );
            $this->load->view('backend/Home', $data);
        }
        
        public function create_action() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
            'nama' => $this->input->post('nama',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
            'harga' => $this->input->post('harga',TRUE),
            'nama_paket' => $this->input->post('nama_paket',TRUE),
            'path' => $this->input->post('path',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'url'   => url_title($this->input->post('name',TRUE), '-', TRUE),
            'metatittle' => $this->input->post('metatittle',TRUE),
            'metadest' => $this->input->post('metadest',TRUE),
            'metakey' => $this->input->post('metakey',TRUE),
            'create_at' => date(),
            'update_at' => date(),
            );

                $this->paketwisata_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success.
                    <br>
                </div>');
                redirect(site_url('paketwisata'));
           }
        }
        
        public function update($id) 
        {
            $row = $this->paketwisata_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('paketwisata/update_action'),
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
            'title'=> 'Category Media Data',         
            'header' => 'backend/header',
            'contents' => 'backend/paketwisata/paketwisata_form',
            'footer' => 'backend/footer',
            );
                $this->load->view('backend/Home', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('paketwisata'));
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
        
        public function delete($id) 
        {
            $row = $this->paketwisata_model->get_by_id($id);

            if ($row) {
                $this->paketwisata_model->delete($id);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success.
                    <br>
                </div>');
                redirect(site_url('paketwisata'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('paketwisata'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('nama', ' ', 'trim|required');
        $this->form_validation->set_rules('keterangan', ' ', 'trim|required');
        $this->form_validation->set_rules('harga', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('path', ' ', 'trim|required');
        $this->form_validation->set_rules('published', ' ', 'trim|required');
        $this->form_validation->set_rules('metatittle', ' ', 'trim|required');
        $this->form_validation->set_rules('metadest', ' ', 'trim|required');
        $this->form_validation->set_rules('metakey', ' ', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <strong>
                    <i class="ace-icon fa fa-times"></i>
                    Oops!
                </strong>
                ', '
                <br>
            </div>');
        } 
}
 
/* End of file paketwisata.php */
/* Location: ./application/controllers/paketwisata.php */

