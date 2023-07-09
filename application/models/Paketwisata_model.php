<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class paketwisata_model extends CI_Model
{

    public $table = 'paket_wisata';
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

    function get_by_all_type($published, $type=null)
    {
        $this->db->where($this->published, $published);
   
        $this->db->join('useradmin', 'paket_wisata.userid = useradmin.id');
        return $this->db->get($this->table);
    }

    function get_media_by_type($id) {
        $this->db->order_by("nama", "ASC");
        $this->db->where("nama", $id);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) return $query->result();              
    }

    function get_by_list($published, $limit, $start = 0, $type=null)
    {
        $this->db->select('paket_wisata.id,
                            paket_wisata.nama,
                            paket_wisata.keterangan,
                            paket_wisata.nama_paket,
                            paket_wisata.harga,
                            paket_wisata.published,
                            paket_wisata.userid,
                            paket_wisata.path,
                            paket_wisata.hits,
                            paket_wisata.url,
                            useradmin.fullname,
                            paket_wisata.metatittle,
                            paket_wisata.metadest,
                            paket_wisata.metakey,
                            paket_wisata.create_at,
                            paket_wisata.update_at');
        $this->db->where($this->published, $published);
     
        $this->db->limit($limit, $start);
      
        $this->db->join('useradmin', 'paket_wisata.userid = useradmin.id');
        return $this->db->get($this->table)->result();
    }

    function get_by_url($url)
    {
        $this->db->select('paket_wisata.id,
                            paket_wisata.nama,
                            paket_wisata.keterangan,
                            paket_wisata.harga,
                            paket_wisata.nama_paket,
                            paket_wisata.published,
                            paket_wisata.userid,
                            paket_wisata.path,
                            paket_wisata.hits,
                            paket_wisata.url,
                            useradmin.fullname,
                            paket_wisata.metatittle,
                            paket_wisata.metadest,
                            paket_wisata.metakey,
                            paket_wisata.create_at,
                            paket_wisata.update_at');
        $this->db->where('url', $url);
        $this->db->join('useradmin', 'paket_wisata.userid = useradmin.id');
        return $this->db->get($this->table)->row();
    }

    function get_by_related($published, $limit, $start = 0, $type)
    {
        $this->db->where($this->published, $published);

        $this->db->limit($limit, $start);
        $this->db->join('useradmin', 'paket_wisata.userid = useradmin.id');
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
	$this->db->or_like('nama', $keyword);
	$this->db->or_like('keterangan', $keyword);
	$this->db->or_like('harga', $keyword);
    $this->db->or_like('nama_paket', $keyword);
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
	$this->db->or_like('nama', $keyword);
    $this->db->or_like('keterangan', $keyword);
    $this->db->or_like('harga', $keyword);
    $this->db->or_like('nama_paket', $keyword);
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