<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class kategori extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->Auth_model->isLoggedIn();
            $this->load->model('kategori_model');
            $this->load->library('form_validation');
        }
 
 
        public function index(){
            //check user logged in or not
            $contents = $this->kategori_model->get_all();
            $data = array(
                'kategori_data' => $contents,
                'title'=> 'kategori Data',
                'header' => 'backend/header',
                'contents' => 'backend/kategori/kategori_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/home',$data);
        }     

        public function read($id) 
        {
            $row = $this->kategori_model->get_by_id($id);
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
                $this->load->view('kategori_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kategori'));
            }
        }
        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('kategori/create_action'),
            'kode' => set_value('kode'),
            'nama' => set_value('nama'),
            
            'title'=> 'Kategori Data',
            'header' => 'backend/header',
            'contents' => 'backend/kategori/kategori_form',
            'footer' => 'backend/footer'
        );
            $this->load->view('backend/home', $data);
        }
        
        public function create_action() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->create();
            } else {
                $data = array(
            'nama' => $this->input->post('name',TRUE),
   
            );

                $this->kategori_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success.
                    <br>
                </div>');
                redirect(site_url('kategori'));
           }
        }
        
        public function update($kode) 
        {
            $row = $this->kategori_model->get_by_id($kode);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('kategori/update_action'),
            'kode' => set_value('kode', $row->kode),
            'nama' => set_value('name', $row->nama),
            
            'title'=> 'Kategori Data',         
            'header' => 'backend/header',
            'contents' => 'backend/kategori/kategori_form',
            'footer' => 'backend/footer'
            );
                $this->load->view('backend/home', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kategori'));
            }
        }
        
        public function update_action() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('kode', TRUE));
            } else {
                $data = array(
            'nama' => $this->input->post('name',TRUE),
        
            );

                $this->kategori_model->update($this->input->post('kode', TRUE), $data);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
                redirect(site_url('kategori'));
            }
        }
        
        public function delete($kode) 
        {
            $row = $this->kategori_model->get_by_id($kode);

            if ($row) {
                $this->kategori_model->delete($kode);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success.
                    <br>
                </div>');
                redirect(site_url('kategori'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('kategori'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('name', ' ', 'trim|required');
      

        $this->form_validation->set_rules('kode', 'kode', 'trim');
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
 
/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */

