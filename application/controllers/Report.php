<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report extends CI_Controller {
 
	function __construct(){
        parent::__construct();
    }
 
 
    /*------------------
    Form Input Laporan
    ------------------*/
    function index()
	{
	     $this->load->view('frontend/report/views_laporan_harian');
	}
 
 
	/*----------------------
    Function Submit Laporan
    ---------------------- */
    function submit_report(){
    	$tanggal = date("Y-m-d H:i:s");
        $nama = $this->input->post('nama');
        $penjualan = $this->input->post('sales');
 
        $report_data = array(
            'tanggal' => $tanggal,
            'nama' => $nama,
            'penjualan' => $penjualan
            );
 
        $this->db->insert('laporan_harian', $report_data);
        $this->load->view('frontend/report/views_laporan_harian_result');
        }
 
}