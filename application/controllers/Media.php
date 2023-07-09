<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Media extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->Model('Auth_model');            
            $this->load->model('Media_model');
            $this->load->model('Categorymedia_model');
            $this->load->library('Form_validation');
            $this->Auth_model->isLoggedIn();
        }
 
 
        public function index(){
            //check user logged in or not
            $contents = $this->Media_model->get_all();
            $data = array(
                'media_data' => $contents,
                'title'=> 'Media Data',
                'header' => 'backend/header',
                'contents' => 'backend/media/media_list',
                'footer' => 'backend/footer'

            );
            $this->load->view('backend/Home',$data);
        }   

        function get_category($id) {
            $tmp     = '';
            $data     = $this->Categorymedia_model->get_media_by_type($id);
            if(!empty($data)){
                $tmp .=    "<option value=''>Selection</option>";    
                foreach($data as $row) {    
                    $tmp .= "<option value='".$row->id."'>".$row->name."</option>";
                }
            } else {
                $tmp .=    "<option value=''>Selection</option>";    
            }
            die($tmp);
        }

        function get_cmedia($id, $selected) {
            $tmp     = '';
            $data     = $this->Categorymedia_model->get_media_by_type($id);
            if(!empty($data)){    
                foreach($data as $row) {
                    $select= $row->id==$selected?'selected':'';
                    $tmp .= '<option value="'.$row->id.'" '.$select.'>'.$row->name.'</option>';
                }
            } else {
                $tmp .=    '<option value="">Selection</option>';    
            }
            return $tmp;
        }  

        public function read($id) 
        {
            $row = $this->media_model->get_by_id($id);
            if ($row) {
                $data = array(
            'id' => $row->id,
            'name' => $row->name,
            'path' => $row->path,            
            'idcmedia' => $row->idcmedia,
            'published' => $row->published,
            'create_at' => $row->create_at,
            'update_at' => $row->update_at,
            );
                $this->load->view('media_read', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('contents'));
            }
        }
        
        public function create() 
        {
            $data = array(
                'button' => 'Create',
                'action' => site_url('media/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'path' => set_value('path'),
            'idcmedia' => set_value('idcmedia'),
            'published' => set_value('published'),
            'title'=> 'Media Data',
            'header' => 'backend/header',
            'contents' => 'backend/media/media_form',
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
            'path' => $this->input->post('path',TRUE),
            'idcmedia' => $this->input->post('idcmedia',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'create_at' => date("Y-m-d H:i:s"),
            'update_at' => date("Y-m-d H:i:s"),
            );

                $this->media_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Create Record Success.
                    <br>
                </div>');
                redirect(site_url('media'));
           }
        }
        
        public function update($id) 
        {
            $row = $this->media_model->get_by_id($id);
            $type = $this->Categorymedia_model->get_by_id($row->idcmedia);
            if ($row) {
                $data = array(
                    'button' => 'Update',
                    'action' => site_url('media/update_action'),
            'id' => set_value('id', $row->id),
            'name' => set_value('name', $row->name),
            'path' => set_value('path', $row->path),
            'idcmedia' => set_value('idcmedia', $row->idcmedia),
            'type' => set_value('type', $type->type),
            'published' => set_value('published', $row->published), 
            'title'=> 'Media Data',
            'header' => 'backend/header',
            'contents' => 'backend/media/media_form',
            'footer' => 'backend/footer'
            );
                $this->load->view('backend/home', $data);
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('media'));
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
            'idcmedia' => $this->input->post('idcmedia',TRUE),
            'published' => $this->input->post('published',TRUE),
            'userid' => $this->session->userdata('id'),
            'update_at' => date("Y-m-d H:i:s"),
            );

                $this->media_model->update($this->input->post('id', TRUE), $data);                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
                redirect(site_url('media'));
            }
        }
        
        public function delete($id) 
        {
            $row = $this->media_model->get_by_id($id);

            if ($row) {
                $this->media_model->delete($id);
                
                $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Delete Record Success.
                    <br>
                </div>');
                redirect(site_url('media'));
            } else {
                $this->session->set_flashdata('message', 'Record Not Found');
                redirect(site_url('media'));
            }
        }

        public function _rules() 
        {
        $this->form_validation->set_rules('name', ' ', 'trim|required');
        $this->form_validation->set_rules('path', ' ', 'trim|required');
        $this->form_validation->set_rules('idcmedia', ' ', 'trim|required');
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
 
/* End of file Media.php */
/* Location: ./application/controllers/Media.php */

