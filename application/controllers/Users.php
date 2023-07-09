<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->load->model('users_model');
            $this->load->library('form_validation');
            $this->Auth_model->isLoggedIn();
        }
 
 
        public function index(){
            //check user logged in or not
            $users = $this->users_model->get_all();
            $data = array(
                'users_data' => $users,
                'title'=> 'Users Data',
                'header' => 'backend/header',
                'contents' => 'backend/users/users_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/Home',$data);
        }     

        public function read($id) 
        {
            $row = $this->users_model->get_by_id($id);
            if ($row) {
                $data = array(
            'id' => $row->id,
            'fullname' => $row->fullname,
            'username' => $row->username,
            'is_active' => $row->is_active,
            'create_at' => $row->create_at,
            'update_at' => $row->update_at,
            );
                $this->load->view('users_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('users'));
            }
        }
        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('users/create_action'),
            'id' => set_value('id'),
            'fullname' => set_value('name'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'is_active' => set_value('is_active'),
            'title'=> 'Users Data',
            'header' => 'backend/header',
            'contents' => 'backend/users/users_form',
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
            'fullname' => $this->input->post('name',TRUE),
            'username' => $this->input->post('username',TRUE),
            'password' => sha1($this->input->post('password',TRUE)),
            'is_active' => $this->input->post('is_active',TRUE),
            'create_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
            );

                $this->users_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success
                    <br>
                </div>');
                redirect(site_url('users'));
           }
        }
        
        public function update($id) 
        {
            $row = $this->users_model->get_by_id($id);

            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('users/update_action'),
            'id' => set_value('id', $row->id),
            'fullname' => set_value('name', $row->fullname),
            'username' => set_value('username', $row->username),
            'password' => set_value('password', ''),
            'is_active' => set_value('is_active', $row->is_active),  
            'title'=> 'Users Data', 
            'header' => 'backend/header',
            'contents' => 'backend/users/users_form',
            'footer' => 'backend/footer'
            );
                $this->load->view('backend/Home', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('users'));
            }
        }
        
        public function update_action() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) {
                $this->update($this->input->post('id', TRUE));
            } else {
                $data = array(
            'fullname' => $this->input->post('name',TRUE),
            'username' => $this->input->post('username',TRUE),
            'password' => sha1($this->input->post('password',TRUE)),
            'is_active' => $this->input->post('is_active',TRUE),
            'update_at' => date("Y-m-d H:i:s"),
            );

                $this->users_model->update($this->input->post('id', TRUE), $data);                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
                redirect(site_url('users'));
            }
        }
        
        public function delete($id) 
        {
            $row = $this->users_model->get_by_id($id);

            if ($row) {
                $this->users_model->delete($id);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success
                    <br>
                </div>');
                redirect(site_url('users'));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Record Not Found
                    <br>
                </div>');
                redirect(site_url('users'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('name', ' ', 'trim|required');
        $this->form_validation->set_rules('username', ' ', 'trim|required');
        $this->form_validation->set_rules('password', ' ', 'trim|required');
        $this->form_validation->set_rules('is_active', ' ', 'trim|required');

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

