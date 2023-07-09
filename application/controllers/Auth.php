<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//location: application/controller/auth.php
 
class Auth extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
        }
 
        public function index()
	    {
	        $this->load->view('backend/login');
	    }
         
        public function logout(){
            $this->session->sess_destroy();
            redirect('/Auth' ,'refresh');
            exit;
        }
         
        public function login(){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('password','Password','required');
            if ($this->form_validation->run()){
                $username =  $this->input->post('username');
                $password =  $this->input->post('password');
                 
                //call the model for auth
                if($this->Auth_model->login($username, $password)){
                	echo json_encode(array('st'=>1, 'msg' => 'success'));
                }
                else{
                    echo json_encode(array('st'=>0, 'msg' =>'Failed. Data your input not found in database.'));
                }
            }else{
                    echo json_encode(array('st'=>0, 'msg' => validation_errors()));
                }
        }
         
         
}
 
/* End of file auth.php */
/* Location: ./application/controllers/auth.php */