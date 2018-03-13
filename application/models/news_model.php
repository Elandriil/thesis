<?php
class News_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('id_news','asc');
		return $this->db->get('news');
	}
	
	function count_all(){
		return $this->db->count_all('news');
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id_news','asc');
		return $this->db->get('news',$limit,$offset);
	}
	
	function get_by_id($id){
		$this->db->where('id_news', $id);
		return $this->db->get('news');
	}
	
	function save($new){
		$this->db->insert('news',$new);
		return $this->db->insert_id();
	}
	
	function update($id, $new){
		$this->db->where('id_news', $id);
		$this->db->update('news',$new);
	}
	
	function delete($id){
		$this->db->where('id_news', $id);
		$this->db->delete('news');
	}

	}
	
