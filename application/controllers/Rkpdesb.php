<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rkpdesb extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Auth_model');
        $this->load->model('Rkpdesb_model');
        $this->load->library('form_validation');
        $this->Auth_model->isLoggedIn();
    }


    public function index()
    {
        //check user logged in or not
        $Rkpdesb = $this->Rkpdesb_model->get_all();
        $data = array(
            'Rkpdesb_data' => $Rkpdesb,
            'title' => 'Rkpdesb Data',
            'header' => 'backend/header',
            'contents' => 'backend/Rkpdesb/Rkpdesb_list',
            'footer' => 'backend/footer'

        );
        $this->load->view('backend/Home', $data);
    }

    public function read($id)
    {
        $row = $this->Rkpdesb_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'dest' => $row->dest,
                'published' => $row->published,
                'metatittle' => $row->metatittle,
                'metadest' => $row->metadest,
                'metakey' => $row->metakey,
                'create_at' => $row->create_at,
                'update_at' => $row->update_at,
            );
            $this->load->view('Rkpdesb_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Rkpdesb'));
        }
    }

    // public function create() 
    // {
    //     $data = array(
    //         'button' => 'Create',
    //         'action' => site_url('Rkpdesb/create_action'),
    //     'id' => set_value('id'),
    //     'name' => set_value('name'),
    //     'dest' => set_value('dest'),
    //     'published' => set_value('published'),
    //     'metatittle' => set_value('metatittle'),
    //     'metadest' => set_value('metadest'),
    //     'metakey' => set_value('metakey'),
    //     'title'=> 'Rkpdesb Data',
    //     'header' => 'backend/header',
    //     'contents' => 'backend/Rkpdesb/Rkpdesb_form',
    //     'footer' => 'backend/footer'
    // );
    //     $this->load->view('backend/Home', $data);
    // }

    // public function create_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->create();
    //     } else {
    //         $data = array(
    //     'name' => $this->input->post('name',TRUE),
    //     'dest' => $this->input->post('dest',TRUE),
    //     'published' => $this->input->post('published',TRUE),
    //     'metatittle' => $this->input->post('metatittle',TRUE),
    //     'metadest' => $this->input->post('metadest',TRUE),
    //     'metakey' => $this->input->post('metakey',TRUE),
    //     'create_at' => date("Y-m-d H:i:s"),
    //     'update_at' => date("Y-m-d H:i:s"),
    //     );

    //         $this->Rkpdesb_model->insert($data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-info">
    //             <button type="button" class="close" data-dismiss="alert">
    //                 <i class="ace-icon fa fa-times"></i>
    //             </button>
    //             <strong>Heads up!</strong>
    //             Create Record Success.
    //             <br>
    //         </div>');
    //         redirect(site_url('Rkpdesb'));
    //    }
    // }

    public function update($id)
    {
        $row = $this->Rkpdesb_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Rkpdesb/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'dest' => set_value('dest', $row->dest),
                'published' => set_value('published', $row->published),
                'metatittle' => set_value('metatittle', $row->metatittle),
                'metadest' => set_value('metadest', $row->metadest),
                'metakey' => set_value('metakey', $row->metakey),
                'title' => 'Rkpdesb Data',
                'header' => 'backend/header',
                'contents' => 'backend/Rkpdesb/Rkpdesb_form',
                'footer' => 'backend/footer'
            );
            $this->load->view('backend/Home', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Rkpdesb'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'dest' => $this->input->post('dest', TRUE),
                'published' => $this->input->post('published', TRUE),
                'metatittle' => $this->input->post('metatittle', TRUE),
                'metadest' => $this->input->post('metadest', TRUE),
                'metakey' => $this->input->post('metakey', TRUE),
                'update_at' => date("Y-m-d H:i:s"),
            );

            $this->Rkpdesb_model->update($this->input->post('id', TRUE), $data);

            $this->session->set_flashdata('message', '<div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <strong>Heads up!</strong>
                    Update Record Success.
                    <br>
                </div>');
            redirect(site_url('Rkpdesb'));
        }
    }

    // public function delete($id) 
    // {
    //     $row = $this->Rkpdesb_model->get_by_id($id);

    //     if ($row) {
    //         $this->Rkpdesb_model->delete($id);

    //         $this->session->set_flashdata('message', '<div class="alert alert-info">
    //             <button type="button" class="close" data-dismiss="alert">
    //                 <i class="ace-icon fa fa-times"></i>
    //             </button>
    //             <strong>Heads up!</strong>
    //             Delete Record Success.
    //             <br>
    //         </div>');
    //         redirect(site_url('Rkpdesb'));
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('Rkpdesb'));
    //     }
    // }

    public function _rules()
    {
        $this->form_validation->set_rules('name', ' ', 'trim|required');
        $this->form_validation->set_rules('dest', ' ', 'trim|required');
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
 
/* End of file Rkpdesb.php */
/* Location: ./application/controllers/Rkpdesb.php */
