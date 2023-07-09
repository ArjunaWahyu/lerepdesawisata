<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//location: application/controller/auth.php

class Site extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting_model');
        $this->load->model('contents_model');
        $this->load->model('events_model');
        $this->load->model('navigations_model');
        $this->load->model('Categorymedia_model');
        $this->load->model('slider_model');
        $this->load->model('evencal_model', 'evencal');
        $this->load->library('calendar', _setting());
    }

    public function index($year = null, $month = null, $day = null)
    {
        $setting = $this->setting_model->get_by_published('Y');
        $contents = $this->contents_model->get_by_published('Y', 4, 0);
        $year  = (empty($year) || !is_numeric($year)) ?  date('Y') :  $year;
        $month = (is_numeric($month) &&  $month > 0 && $month < 13) ? $month : date('m');
        $day   = (is_numeric($day) &&  $day > 0 && $day < 31) ?  $day : date('d');

        $date      = $this->evencal->getDateEvent($year, $month);
        $cur_event = $this->evencal->getEvent($year, $month, $day);
        $data      = array(
            'notes' => $this->calendar->generate($year, $month, $date),
            'year'  => $year,
            'mon'   => $month,
            'month' => _month($month),
            'day'   => $day,
            'events' => $cur_event,
            'metatittle' => $setting->metatittle,
            'metadest' => $setting->metadest,
            'metakey' => $setting->metakey,
            'about' => $setting->dest,
            'contents' => $contents,
            'header' => 'frontend/header',
            'navigation' => 'frontend/navigation',
            'footer' => 'frontend/footer'
        );
        $this->load->view('frontend/home', $data);
    }

    public function read($url = null, $year = null, $month = null, $day = null)
    {

        $row = $this->contents_model->get_by_url($url);
        $setting = $this->setting_model->get_by_published('Y');
        $year  = (empty($year) || !is_numeric($year)) ?  date('Y') :  $year;
        $month = (is_numeric($month) &&  $month > 0 && $month < 13) ? $month : date('m');
        $day   = (is_numeric($day) &&  $day > 0 && $day < 31) ?  $day : date('d');

        $date      = $this->evencal->getDateEvent($year, $month);
        $cur_event = $this->evencal->getEvent($year, $month, $day);


        if ($row) {
            $contents = $this->contents_model->get_by_related('Y', 4, 0, $row->type);
            if ($row->type == 1) {
                $value = 'Pariwisata';
            } elseif ($row->type == 2) {
                $value = 'Budaya';
            } else {
                $value = 'Blogs';
            }
            $data = array(
                'about' => $setting->dest,
                'name' => $row->name,
                'dest' => $row->dest,
                'type' => $row->type,
                'published' => $row->published,
                'userid' => $row->userid,
                'path' => $row->path,
                'fullname' => $row->fullname,
                'metatittle' => $row->metatittle,
                'metadest' => $row->metadest,
                'metakey' => $row->metakey,
                'create_at' => $row->create_at,
                'update_at' => $row->update_at,
                'header' => 'frontend/header',
                'navigation' => 'frontend/navigation',
                'footer' => 'frontend/footer',
                'breadname'    => $value,
                'breadtitle' => 'view articles in budaya',
                'breadurl' => base_url(strtolower($value)),
                'contents' => $contents,
                'notes' => $this->calendar->generate($year, $month, $date),
                'year'  => $year,
                'mon'   => $month,
                'month' => _month($month),
                'day'   => $day,
                'events' => $cur_event,
            );
            $update = array(
                'hits' => $row->hits + 1
            );
            $this->contents_model->update($row->id, $update);
            $this->load->view('frontend/single_post', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('frontend/home'));
        }
    }
}
 
/* End of file Site.php */
/* Location: ./application/controllers/Site.php */