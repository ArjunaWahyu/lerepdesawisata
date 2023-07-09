<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class pelayananb extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->load->model('pelayanan_model');
            $this->load->library('form_validation');
            $this->Auth_model->isLoggedIn();
        }
 
 
        public function index(){
            //check user logged in or not
            $contents = $this->pelayanan_model->get_all();
            $data = array(
                'pelayanan_data' => $contents,
                'title'=> 'pelayanan Data',
                'header' => 'backend/header',
                'contents' => 'backend/pelayanan/pelayanan_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/home',$data);
        }     

        public function read($id) 
        {
            $row = $this->pelayanan_model->get_by_id($id);
            if ($row) {
                $data = array(
            'id' => $row->id,
            'name' => $row->name,
            'path' => $row->path,  
            'published' => $row->published,
            'create_at' => $row->create_at,
            'update_at' => $row->update_at,
            );
                $this->load->view('pelayanan_model', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('contents'));
            }
        }
        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('pelayanan/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'path' => set_value('path'),
            'published' => set_value('published'),
            'title'=> 'pelayanan Data',
            'header' => 'backend/header',
            'contents' => 'backend/pelayanan/pelayanan_form',
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
            'name' => $this->input->post('name',TRUE),
            'path' => $this->input->post('path',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'create_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
            );

                $this->pelayanan_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success.
                    <br>
                </div>');
                redirect(site_url('pelayanan'));
           }
        }
        
        public function update($id) 
        {
            $row = $this->pelayanan_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('pelayananb/update_action'),
            'id' => set_value('id', $row->id),
            'name' => set_value('name', $row->name),
            'path' => set_value('path', $row->path),
            'published' => set_value('published', $row->published), 
            'title'=> 'pelayanan Data',
            'header' => 'backend/header',
            'contents' => 'backend/pelayanan/pelayanan_form',
            'footer' => 'backend/footer'
            );
                $this->load->view('backend/home', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pelayanan'));
            }
        }
        
        public function update_action() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
            'name' => $this->input->post('name',TRUE),
            'path' => $this->input->post('path',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'update_at' => date("Y-m-d H:i:s"),
            );

                $this->pelayanan_model->update($this->input->post('id', TRUE), $data);                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
                redirect(site_url('pelayananb'));
            }
        }
        
        public function delete($id) 
        {
            $row = $this->pelayanan_model->get_by_id($id);

            if ($row) {
                $this->pelayanan_model->delete($id);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success.
                    <br>
                </div>');
                redirect(site_url('pelayanan'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('pelayanan'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('name', ' ', 'trim|required');
        $this->form_validation->set_rules('path', ' ', 'trim|required');
        $this->form_validation->set_rules('published', ' ', 'trim|required');

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
 
/* End of file pelayanan.php */
/* Location: ./application/controllers/pelayanan.php */

