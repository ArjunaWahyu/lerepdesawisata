<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class kategori_model extends CI_Model
{

    public $table = 'kategori_paket';
    public $kode = 'kode';
  
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all()
    {
        $this->db->order_by($this->kode, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_all_type($published, $type=null)
    {
   
        $this->db->where('kode', $type);
      
        return $this->db->get($this->table);
    }

    function get_media_by_type($kode) {
        $this->db->order_by("nama", "ASC");
        $this->db->where("kode", $kode);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) return $query->result();              
    }

    function get_by_list($kode, $limit, $start = 0)
    {
        $this->db->select('kategori_data.kode,
                            kategori_data.nama
                            ');
        $this->db->where($this->kode, $kode);
      
        $this->db->limit($limit, $start);
        $this->db->order_by('kode', $this->order);
     
        return $this->db->get($this->table)->result();
    }

    function get_by_url($url)
    {
        $this->db->select('kategori_data.kode,
                            kategori_data.nama
                          ');
        $this->db->where('kode', $kode);
      
        return $this->db->get($this->table)->row();
    }

    function get_by_related($kode, $limit, $start = 0)
    {
        $this->db->where($this->kode, $kode);
       
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data by kode
    function get_by_id($kode)
    {
        $this->db->where($this->kode, $kode);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->kode, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {
        $this->db->like('kode', $keyword);
    $this->db->or_like('nama', $keyword);
   
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->kode, $this->order);
        $this->db->like('kode', $keyword);
    $this->db->or_like('nama', $keyword);
  
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($kode, $data)
    {
        $this->db->where($this->kode, $kode);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($kode)
    {
        $this->db->where($this->kode, $kode);
        $this->db->delete($this->table);
    }

}

/* End of file Contents_model.php */
/* Location: ./application/models/Contents_model.php */