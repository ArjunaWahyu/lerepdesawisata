<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//location: application/controller/auth.php
 
class homestay extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('setting_model');
            $this->load->model('categorymedia_model');
            $this->load->model('homestay_model');
            $this->load->model('contents_model');
            $this->load->model('events_model');
            $this->load->model('navigations_model');    
            $this->load->model('media_model');    
            $this->load->model('slider_model');
            $this->load->model('evencal_model', 'evencal');
            $this->load->library('calendar', _setting());          
        }
 
        public function index()
        {           
             $this->page();
        }

         public function page($offset=0, $offset=0, $year = null, $month = null, $day = null){

            $row = $this->navigations_model->get_by_name('Homestay');            

            // $jml = $this->homestay_model->get_by_all_type('Y');
            
            $config['base_url'] = base_url().'homestay/page/';
            
            // $config['total_rows'] = $jml->num_rows();
            $config['per_page'] = 100; /*Jumlah data yang dipanggil perhalaman*/  
            //$config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/
            
            /*Class bootstrap pagination yang digunakan*/
            $config['full_tag_open'] = "<ul>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
        
            $this->pagination->initialize($config);

            $data['halaman'] = $this->pagination->create_links();
            /*membuat variable halaman untuk dipanggil di view nantinya*/
            $data['offset'] = $offset;

            $data['dataq'] = $this->homestay_model->get_by_list('Y',$config['per_page'], $offset, '1');
            $setting = $this->setting_model->get_by_published('Y');
            $data['about'] = $setting->dest;

            $data['metatittle']   = $row->metatittle;
            $data['metadest']   = $row->metadest;
            $data['metakey']   = $row->metakey;
            $data['header']   = 'frontend/header';
            $data['footer']   = 'frontend/footer';
            $data['navigation']   = 'frontend/navigation';
            // $data['type']   = $row->name;
            $data['urls']   = base_url($row->link);

             $year  = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
            $month = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
            $day   = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
               
            $date      = $this->evencal->getDateEvent($year, $month);
            $cur_event = $this->evencal->getEvent($year, $month, $day);
            
            $data['notes'] = $this->calendar->generate($year, $month, $date);
            $data['year']  = $year;
            $data['mon']   = $month;
            $data['month'] = _month($month);
            $data['day']   = $day;
            $data['events'] = $cur_event;

            /*memanggil view pagination*/
            $this->load->view('frontend/homestay',$data);

        }

        public function read($url=null,$offset=0, $year = null, $month = null, $day = null){
            $row                = $this->homestay_model->get_by_url($url);
            $galery             = $this->media_model->get_by_idcat($row->id);
            $contents           = $this->homestay_model->get_by_related('Y',100,0);
            $setting            = $this->setting_model->get_by_published('Y');
            $data['about']      = $setting->dest;
            $data['contents']   = $contents;
            $data['galery']     = $galery;
            $data['name']       = $row->name;
            $data['dest']       = $row->dest;
            // $data['type']       = $row->type;
            $data['path']       = $row->path;
            $data['fullname']   = $row->fullname;
            $data['metatittle'] = $row->metatittle;
            $data['metadest']   = $row->metadest;
            $data['metakey']    = $row->metakey;
            $data['create_at']  = $row->create_at;
            $data['update_at']  = $row->update_at;
            $data['header']     = 'frontend/header';
            $data['footer']     = 'frontend/footer';
            $data['navigation'] = 'frontend/navigation';
            $data['urls']       = base_url(strtolower($row->name));
            $update             = array(
                    'hits' => $row->hits + 1
                    );
                 $this->homestay_model->update($row->id, $update);


            $year               = (empty($year) || !is_numeric($year))?  date('Y') :  $year;
            $month              = (is_numeric($month) &&  $month > 0 && $month < 13)? $month : date('m');
            $day                = (is_numeric($day) &&  $day > 0 && $day < 31)?  $day : date('d');
               
            $date               = $this->evencal->getDateEvent($year, $month);
            $cur_event          = $this->evencal->getEvent($year, $month, $day);
            
            $data['notes'] = $this->calendar->generate($year, $month, $date);
            $data['year']  = $year;
            $data['mon']   = $month;
            $data['month'] = _month($month);
            $data['day']   = $day;
            $data['events'] = $cur_event;

            $this->load->view('frontend/single_homestay',$data);     
        }
         
}
 
/* End of file Blogs.php */
/* Location: ./application/controllers/Blogs.php */