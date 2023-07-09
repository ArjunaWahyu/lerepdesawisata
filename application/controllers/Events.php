<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Events extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->load->model('events_model');
            $this->load->library('form_validation');
            $this->Auth_model->isLoggedIn();
        }
 
 
        public function index(){
            //check user logged in or not
            $contents = $this->events_model->get_all();
            $data = array(
                'events_data' => $contents,
                'title'=> 'Events Data',
                'header' => 'backend/header',
                'contents' => 'backend/events/events_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/Home',$data);
        }     

        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('events/create_action'),
            'idevent' => set_value('idevent'),
            'event_date' => set_value('event_date'),
            'event_time' => set_value('event_time'),
            'event' => set_value('event'),
            'published' => set_value('published'),
            'title'=> 'Events Data',
            'header' => 'backend/header',
            'contents' => 'backend/events/events_form',
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
            $this->events_model->addEvent(
            $this->input->post('event_date'), 
            $this->input->post('hour').":".$this->input->post('minute').":00",
            $this->input->post('event'),
            $this->input->post('published',TRUE),
            $this->session->userdata('id'),
            date("Y-m-d H:i:s"),
            date("Y-m-d H:i:s"));

               // $this->events_model->addEvent($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success.
                    <br>
                </div>');
                redirect(site_url('events'));
           }
        }
        
        
        
        public function delete($id) 
        {
            $row = $this->events_model->get_by_id($id);

            if ($row) {
                $this->events_model->deleteEvent($id);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success.
                    <br>
                </div>');
                redirect(site_url('events'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('events'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('event_date', ' ', 'trim|required');
        $this->form_validation->set_rules('hour', ' ', 'trim|required');
        $this->form_validation->set_rules('minute', ' ', 'trim|required');
        $this->form_validation->set_rules('event', ' ', 'trim|required');
        $this->form_validation->set_rules('published', ' ', 'trim|required');

        $this->form_validation->set_rules('idevent', 'idevent', 'trim');
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

