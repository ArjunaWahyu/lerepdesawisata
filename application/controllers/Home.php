<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');
        }
 
 
        public function index(){
            //check user logged in or not
            $this->Auth_model->isLoggedIn();
            $data   = array('title' => 'Dashboard',
                            'header' => 'backend/header',
                            'contents' =>'backend/welcome',
                            'footer' => 'backend/footer');
            $this->load->view('backend/Home',$data);
        }      
}
 
/* End of file home.php */
/* Location: ./application/controllers/home.php */
