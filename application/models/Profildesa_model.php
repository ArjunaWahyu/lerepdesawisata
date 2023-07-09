<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profildesa_model extends CI_Model
{

    public $table = 'profil';
    public $id = 'id';
    public $url = 'url';
    public $published = 'published';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_all_id($published, $id=null)
    {
        $this->db->where($this->published, $published);
        // $this->db->where('id', $id);
        // $this->db->join('useradmin', 'profil.userid = useradmin.id');
        return $this->db->get($this->table);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by url
    function get_by_url($id)
    {

        $this->db->select('profil.id,
                            profil.name,
                            profil.dest,
                            profil.id,
                            profil.published,
                      
                       
                            profil.metatittle,
                            profil.metadest,
                            profil.metakey,
                            profil.create_at,
                            profil.update_at,');
        $this->db->where($this->id, $id);

        return $this->db->get($this->table)->row();
    }

    function get_by_published($published,$limit, $start = 0)
    {
        $this->db->where($this->published, $published);
        $this->db->limit($limit, $start);
        // $this->db->join('useradmin', 'profil.userid = useradmin.id');
        return $this->db->get($this->table)->result();
    }
    function get_by_all_type($published, $published=null)
    {
        $this->db->where($this->published, $published);
       
        return $this->db->get($this->table);
    }
        function get_by_name($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->row();
    }
    function get_by_list($published,$limit, $start = 0, $id=null)
    {
        $this->db->select('profil.id,
                            profil.name,
                            profil.dest,
                   
                            profil.published,
                      
                       
                            profil.metatittle,
                            profil.metadest,
                            profil.metakey,
                            profil.create_at,
                            profil.update_at');
        $this->db->where($this->published, $published);
      
        $this->db->limit($limit, $start);
        $this->db->order_by('id', $this->order);
      
        return $this->db->get($this->table)->result();
    }

    function get_by_related($published,$limit, $start = 0, $id)
    {
        $this->db->where($this->published, $published);
        $this->db->where('id', $id);
        $this->db->limit($limit, $start);
   
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows() {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit
    function index_limit($limit, $start = 0) {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get search total rows
    function search_total_rows($keyword = NULL) {


        $this->db->like('id', $keyword);
    $this->db->or_like('name', $keyword);
    $this->db->or_like('dest', $keyword);
   
    $this->db->or_like('published', $keyword);
  
    $this->db->or_like('metatittle', $keyword);
    $this->db->or_like('metadest', $keyword);
    $this->db->or_like('metakey', $keyword);
    $this->db->or_like('create_at', $keyword);
    $this->db->or_like('update_at', $keyword);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get search data with limit
    function search_index_limit($limit, $start = 0, $keyword = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $keyword);
    $this->db->or_like('name', $keyword);
    $this->db->or_like('dest', $keyword);

    $this->db->or_like('published', $keyword);
 
    $this->db->or_like('metatittle', $keyword);
    $this->db->or_like('metadest', $keyword);
    $this->db->or_like('metakey', $keyword);
    $this->db->or_like('create_at', $keyword);
    $this->db->or_like('update_at', $keyword);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file profil_model.php */
/* Location: ./application/models/profil_model.php */