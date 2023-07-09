<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class potensi_wisata_model extends CI_Model
{

    public $table = 'potensi';
    public $id = 'id';
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

    function get_by_all_type($published)
    {
        $this->db->where($this->published, $published);
        // $this->db->where('type', $type);
        $this->db->join('useradmin', 'potensi.userid = useradmin.id');
        return $this->db->get($this->table);
    }

    function get_media_by_type($published) {
        $this->db->order_by("name", "ASC");
        $this->db->where("published", $published);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) return $query->result();              
    }

    function get_by_list($published, $limit, $start = 0)
    {
        $this->db->select('potensi.id,
                            potensi.name,
                            potensi.dest,
                     
                            potensi.published,
                            potensi.userid,
                            potensi.path,
                            potensi.hits,
                            potensi.url,
                            useradmin.fullname,
                            potensi.metatittle,
                            potensi.metadest,
                            potensi.metakey,
                            potensi.create_at,
                            potensi.update_at');
        $this->db->where($this->published, $published);
        // $type==null?'':$this->db->where('type', $type);
        $this->db->limit($limit, $start);
        $this->db->order_by('hits', $this->order);
        $this->db->join('useradmin', 'potensi.userid = useradmin.id');
        return $this->db->get($this->table)->result();
    }

    function get_by_url($url)
    {
        $this->db->select('potensi.id,
                            potensi.name,
                            potensi.dest,
                            potensi.type,
                            potensi.published,
                            potensi.userid,
                            potensi.path,
                            potensi.hits,
                            potensi.url,
                            useradmin.fullname,
                            potensi.metatittle,
                            potensi.metadest,
                            potensi.metakey,
                            potensi.create_at,
                            potensi.update_at');
        $this->db->where('url', $url);
        $this->db->join('useradmin', 'potensi.userid = useradmin.id');
        return $this->db->get($this->table)->row();
    }

    function get_by_related($published, $limit, $start = 0)
    {
        $this->db->where($this->published, $published);
        // $this->db->where('type', $type);
        $this->db->limit($limit, $start);
        $this->db->join('useradmin', 'potensi.userid = useradmin.id');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
    // $this->db->or_like('type', $keyword);
    $this->db->or_like('published', $keyword);
    $this->db->or_like('userid', $keyword);
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
    // $this->db->or_like('type', $keyword);
    $this->db->or_like('published', $keyword);
    $this->db->or_like('userid', $keyword);
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

/* End of file Contents_model.php */
/* Location: ./application/models/Contents_model.php */