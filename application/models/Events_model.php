<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Events_model extends CI_Model
{

    public $table = 'event_detail';
    public $id = 'idevent';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function get_by_published($published, $limit, $start = 0)
    {
        $this->db->where('published', $published);
        $this->db->order_by('event_date', $this->order);
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
	$this->db->or_like('date', $keyword);
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
	$this->db->or_like('date', $keyword);
	$this->db->or_like('create_at', $keyword);
	$this->db->or_like('update_at', $keyword);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert event
     function addEvent($date, $time, $event,$published,$userid,$create_at,$update_at){ 
      $check = $this->db->get_where('events', array('event_date' => "$date"));
      if($check->num_rows() > 0){
       $this->db->query("UPDATE events SET total_events = total_events + 1 WHERE event_date = ?", array("$date"));
       $this->db->insert('event_detail', array('event_date' => "$date", 'event_time' => $time, 'event' => $event, 'published' => $published,'userid' => $userid,'create_at' => $create_at,'update_at' => $update_at));
      }else{
       $this->db->insert('events', array('event_date' => "$date", 'total_events' => 1));
          $this->db->insert('event_detail', array('event_date' => "$date", 'event_time' => $time, 'event' => $event, 'published' => $published,'userid' => $userid,'create_at' => $create_at,'update_at' => $update_at));
      }
       
     }
      
     // delete event
     function deleteEvent($id){
      $row = $this->get_by_id($id);
      $this->db->delete("event_detail", array('idevent' => $id));
      $check = $this->db->query('SELECT count(*) as total FROM event_detail WHERE event_date = ?', array("$row->event_date"))->row();
      if($check->total > 0){
       $this->db->update('events', array('total_events' => $check->total), array('event_date' => "$row->event_date"));
      }else{
       $this->db->delete("events", array('event_date' => "$row->event_date"));
      }
      return $check->total;
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

/* End of file Events_model.php */
/* Location: ./application/models/Events_model.php */