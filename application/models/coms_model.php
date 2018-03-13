<?php
class Coms_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('id_com','asc');
		return $this->db->get('comments');
	}
	
	function count_all(){
		return $this->db->count_all('comments');
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id_com','asc');
		return $this->db->get('comments',$limit,$offset);
	}
	
	function get_by_id($id){
		$this->db->where('id_com', $id);
		return $this->db->get('comments');
	}
	
	function save($com){
		$this->db->insert('comments',$com);
		return $this->db->insert_id();
	}
	
	function update($id, $com){
		$this->db->where('id_com', $id);
		$this->db->update('comments',$com);
	}
	
	function delete($id){
		$this->db->where('id_com', $id);
		$this->db->delete('comments');
	}

	}
	
