<?php
class Prog_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('name_prog','asc');
		return $this->db->get('programs');
	}
	
	function count_all(){
		return $this->db->count_all('programs');
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('name_prog','asc');
		return $this->db->get('programs',$limit,$offset);
	}
	
	function get_by_id($id){
		$this->db->where('id_prog', $id);
		return $this->db->get('programs');
	}
	
	function save($prog){
		$this->db->insert('programs',$prog);
		return $this->db->insert_id();
	}
	
	function update($id, $prog){
		$this->db->where('id_prog', $id);
		$this->db->update('programs',$prog);
	}
	
	function delete($id){
		$this->db->where('id_news', $id);
		$this->db->delete('programs');
	}

	}
	
