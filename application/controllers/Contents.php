<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Contents extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->load->model('contents_model');
            $this->load->library('form_validation');
            $this->Auth_model->isLoggedIn();
        }
 
 
        public function index(){
            //check user logged in or not
            $contents = $this->contents_model->get_all();
            $data = array(
                'contents_data' => $contents,
                'title'=> 'Contents Data',
                'header' => 'backend/header',
                'contents' => 'backend/content/contents_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/Home',$data);
        }     

        public function read($id) 
        {
            $row = $this->contents_model->get_by_id($id);
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
                $this->load->view('contents_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('contents'));
            }
        }
        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('contents/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'dest' => set_value('dest'),
            'type' => set_value('type'),
            'path' => set_value('path'),
            'path2' => set_value('path2'),
            'published' => set_value('published'),
            'metatittle' => set_value('metatittle'),
            'metadest' => set_value('metadest'),
            'metakey' => set_value('metakey'),
            'title'=> 'Contents Data',
            'header' => 'backend/header',
            'contents' => 'backend/content/contents_form',
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
            'name' => $this->input->post('name',TRUE),
            'dest' => $this->input->post('dest',TRUE),
            'type' => $this->input->post('type',TRUE),
            'path' => $this->input->post('path',TRUE),
            'path2' => $this->input->post('path2',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'url'   => url_title($this->input->post('name',TRUE), '-', TRUE),
            'metatittle' => $this->input->post('metatittle',TRUE),
            'metadest' => $this->input->post('metadest',TRUE),
            'metakey' => $this->input->post('metakey',TRUE),
            'create_at' => time(),
            'update_at' => time(),
            );

                $this->contents_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success.
                    <br>
                </div>');
                redirect(site_url('contents'));
           }
        }
        
        public function update($id) 
        {
            $row = $this->contents_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('contents/update_action'),
            'id' => set_value('id', $row->id),
            'name' => set_value('name', $row->name),
            'dest' => set_value('dest', $row->dest),
            'type' => set_value('type', $row->type),
            'path' => set_value('path', $row->path),
            'path2' => set_value('path2', $row->path2),
            'published' => set_value('published', $row->published),
            'metatittle' => set_value('metatittle', $row->metatittle),
            'metadest' => set_value('metadest', $row->metadest),
            'metakey' => set_value('metakey', $row->metakey),   
            'title'=> 'Contents Data',         
            'header' => 'backend/header',
            'contents' => 'backend/content/contents_form',
            'footer' => 'backend/footer'
            );
                $this->load->view('backend/Home', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('contents'));
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
            'dest' => $this->input->post('dest',TRUE),
            'type' => $this->input->post('type',TRUE),
            'path' => $this->input->post('path',TRUE),
            'path2' => $this->input->post('path2',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'url'   => url_title($this->input->post('name',TRUE), '-', TRUE),
            'metatittle' => $this->input->post('metatittle',TRUE),
            'metadest' => $this->input->post('metadest',TRUE),
            'metakey' => $this->input->post('metakey',TRUE),
            'update_at' => time(),
            );

                $this->contents_model->update($this->input->post('id', TRUE), $data);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
                redirect(site_url('contents'));
            }
        }
        
        public function delete($id) 
        {
            $row = $this->contents_model->get_by_id($id);

            if ($row) {
                $this->contents_model->delete($id);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success.
                    <br>
                </div>');
                redirect(site_url('contents'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('contents'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('name', ' ', 'trim|required');
        $this->form_validation->set_rules('dest', ' ', 'trim|required');
        $this->form_validation->set_rules('type', ' ', 'trim|required|numeric');
        $this->form_validation->set_rules('path', ' ', 'trim|required');
        $this->form_validation->set_rules('path2', ' ', 'trim|required');
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
 
/* End of file Contents.php */
/* Location: ./application/controllers/Contents.php */

